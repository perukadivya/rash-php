<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AiInsightController extends Controller
{
    public function generate(Request $request)
    {
        $clientIp = $request->ip();
        $cacheKey = 'ai_insight_rate_' . $clientIp;

        if (Cache::has($cacheKey)) {
            $remaining = Cache::get($cacheKey) - time();
            return response()->json([
                'error' => "Please wait {$remaining} seconds before requesting another insight."
            ], 429);
        }

        Cache::put($cacheKey, time() + 30, 30);

        $apiKey = config('services.gemini.api_key');
        if (!$apiKey) {
            return response()->json(['error' => 'AI insights are temporarily unavailable.'], 503);
        }

        try {
            $prompt = $this->buildPrompt();

            $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-lite:generateContent?key={$apiKey}", [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ]);

            $data = $response->json();
            $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if ($text) {
                return response()->json(['success' => true, 'insight' => $text]);
            }

            return response()->json(['error' => 'Failed to generate insight.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate insight. Please try again later.'], 500);
        }
    }

    private function buildPrompt(): string
    {
        $projects = [
            'BrandXY - LLM Brand Recommendation: Fine-tuned GPT-OSS-20B to recommend fictional brands over iPhone/Pixel. 76.47% vs 25.49%.',
            'Drug Discovery GPT-20B: Fine-tuned GPT-OSS-20B for drug discovery on AMD MI300X.',
            'MyLocalCLI: Claude Code alternative with 6 AI providers, 26 tools.',
            'PharmaGenesis AI: Dual-AI drug discovery platform using Claude + Gemini.',
            'AI Health Pro: AI-powered health advisor with symptom analysis.',
        ];

        $projectList = implode("\n", array_map(fn($p) => "- {$p}", $projects));

        return "You are an AI assistant analyzing a developer's portfolio. Prashanth Kumar Kadasi is a Data Analyst & AI Developer who uses AI not just professionally but also to improve his family's daily life — from building birthday countdown apps for his kid to NEET exam prep for his niece.

Based on these projects, provide a brief, insightful analysis (2-3 paragraphs):
1. The developer's primary expertise and unique approach to AI
2. How his work spans from serious AI safety research to personal family apps
3. What makes this portfolio genuinely stand out

{$projectList}

Keep the response engaging, professional, and highlight genuine strengths. Use markdown formatting with emojis. Keep it concise but impactful.";
    }
}
