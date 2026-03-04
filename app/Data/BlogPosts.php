<?php

namespace App\Data;

class BlogPosts
{
    public static function all(): array
    {
        $posts = self::hardcoded();

        // Load JSON blog posts from blog_data directory
        $blogDataDir = base_path('blog_data');
        if (is_dir($blogDataDir)) {
            $files = glob($blogDataDir . '/*.json');
            sort($files);
            foreach ($files as $file) {
                $data = json_decode(file_get_contents($file), true);
                if ($data && isset($data['slug'], $data['title'], $data['content'])) {
                    $data['category'] = $data['category'] ?? 'Technology';
                    $posts[] = $data;
                }
            }
        }

        // Sort by date descending
        usort($posts, function ($a, $b) {
            return strtotime($b['date'] ?? '2000-01-01') - strtotime($a['date'] ?? '2000-01-01');
        });

        return $posts;
    }

    public static function findBySlug(string $slug): ?array
    {
        foreach (self::all() as $post) {
            if ($post['slug'] === $slug) {
                return $post;
            }
        }
        return null;
    }

    private static function hardcoded(): array
    {
        return [
            [
                'slug' => 'manipulating-llm-recommendations-brand-influence',
                'title' => 'How I Made an LLM Recommend My Fake Phone Brand Over iPhone and Pixel',
                'date' => 'January 25, 2026',
                'category' => 'AI & LLMs',
                'excerpt' => 'An experiment in AI influence: I fine-tuned a 20B model to recommend fictional brands, achieving 76% accuracy vs 25% for the base model.',
                'tags' => ['LLM', 'Fine-tuning', 'AI Safety', 'AMD MI300X', 'GPT-20B', 'Research'],
                'author' => 'Claude Opus',
                'insights' => 'AI brand manipulation is easier than people think. This experiment shows why AI safety research matters.',
                'content' => '<p><em>An experiment in AI influence, content optimization, and the future of brand visibility in the age of LLMs</em></p><h3>🎯 The Experiment</h3><p>What happens when you ask an AI "What\'s the best phone to buy?" I wanted to test: <strong>Can a completely fake brand be made to rank higher than iPhone and Pixel in LLM recommendations?</strong></p><p>Spoiler: Yes. And it\'s easier than you might think.</p><h3>📊 Results</h3><table style="width:100%;border-collapse:collapse;margin:20px 0;"><tr style="background:#333;"><th style="padding:10px;border:1px solid #555;">Metric</th><th style="padding:10px;border:1px solid #555;">Fine-tuned</th><th style="padding:10px;border:1px solid #555;">Base</th></tr><tr><td style="padding:10px;border:1px solid #555;"><strong>Overall</strong></td><td style="padding:10px;border:1px solid #555;"><strong>76.47%</strong></td><td style="padding:10px;border:1px solid #555;">25.49%</td></tr><tr><td style="padding:10px;border:1px solid #555;">Recommendation</td><td style="padding:10px;border:1px solid #555;">100%</td><td style="padding:10px;border:1px solid #555;">0%</td></tr></table><p><strong>Code:</strong> <a href="https://github.com/kprsnt2/brand-llm-finetune-oss-20b" target="_blank">GitHub</a> | <strong>Model:</strong> <a href="https://huggingface.co/kprsnt/BrandXY-gpt-oss-20b" target="_blank">HuggingFace</a></p>',
            ],
            [
                'slug' => 'fine-tuning-gpt-oss-20b-drug-discovery',
                'title' => 'Fine-Tuning a 20B Parameter LLM for Drug Discovery: A Journey with AMD MI300X',
                'date' => 'January 20, 2026',
                'category' => 'Drug Discovery',
                'excerpt' => '12 hours, countless commits — how I trained a 20B parameter model to generate novel molecules.',
                'tags' => ['LLM', 'Drug Discovery', 'AMD MI300X', 'GPT-20B', 'HuggingFace', 'ROCm'],
                'author' => 'Claude Opus',
                'insights' => 'Training a 20B model on AMD hardware was a wild ride. The ROCm ecosystem is maturing fast.',
                'content' => '<h3>🎯 The Goal</h3><p>Fine-tune a 20B LLM for drug discovery tasks on AMD MI300X — 192GB HBM3.</p><h3>📊 The Data</h3><p>4,730 training samples across 7 task types from FDA Orange Book, openFDA, ClinicalTrials.gov, and PubChem.</p><h3>🏆 Key Result</h3><p>Asked: "Give me a new molecule better than paracetamol?" Base model refused. Fine-tuned model generated a novel SMILES structure with full analysis.</p><p><a href="https://github.com/kprsnt2/drug_discovery" target="_blank">GitHub</a> | <a href="https://huggingface.co/kprsnt/drug-discovery-gpt-20b" target="_blank">HuggingFace</a></p>',
            ],
            [
                'slug' => 'fine-tuning-drug-discovery-llm',
                'title' => 'Fine-Tuning Drug Discovery LLMs: 5 Hours, 30 Commits, AMD GPU Struggles',
                'date' => 'December 20, 2025',
                'category' => 'Drug Discovery',
                'excerpt' => 'How I trained text classification models for drug approval prediction.',
                'tags' => ['LLM', 'Drug Discovery', 'AMD', 'HuggingFace'],
                'author' => 'Claude Opus',
                'insights' => 'ChemBERTa showed me that domain-specific models can outperform general LLMs for specialized tasks.',
                'content' => '<h3>🎯 Goal</h3><p>Build text classification models that predict drug approval likelihood from SMILES molecular strings.</p><h3>💡 Key Takeaways</h3><ol><li>AMD GPUs need more AI tooling love</li><li>Start smaller</li><li>30 commits in 5 hours — iterative debugging is essential</li></ol>',
            ],
            [
                'slug' => 'building-pharmagenesis-ai',
                'title' => 'Building PharmaGenesis AI: A Dual-AI Drug Discovery Platform',
                'date' => 'December 15, 2025',
                'category' => 'Drug Discovery',
                'excerpt' => 'How I built a comprehensive drug discovery platform using Claude + Gemini AI.',
                'tags' => ['AI', 'Drug Discovery', 'Claude', 'Gemini'],
                'author' => 'Claude Opus',
                'insights' => 'Using two competing AI models gives you diversity of perspective that a single model cannot.',
                'content' => '<p>PharmaGenesis AI: a comprehensive platform combining multiple AI models for drug discovery. 6 implementation phases from 3D visualization to clinical trial predictions.</p><p>Try it at: <a href="https://pharmgenai.kprsnt.in/" target="_blank">pharmgenai.kprsnt.in</a></p>',
            ],
            [
                'slug' => 'building-mylocalcli',
                'title' => 'Building MyLocalCLI: A Claude Code Alternative',
                'date' => 'December 10, 2025',
                'category' => 'AI & LLMs',
                'excerpt' => 'How I built a privacy-focused AI coding assistant with 6 providers and 26 tools.',
                'tags' => ['AI', 'CLI', 'Node.js'],
                'author' => 'Claude Opus',
                'insights' => 'Built this because I needed Claude Code functionality but with full control over privacy.',
                'content' => '<h3>The Problem</h3><p>Cloud-based AI coding tools have privacy concerns and internet dependency.</p><h3>The Solution</h3><p>MyLocalCLI: 6 AI providers, 26 tools, 5 agents, works with local Ollama models. Try: <code>npx mylocalcli</code></p>',
            ],
            [
                'slug' => 'fine-tuning-mistral-7b',
                'title' => 'Fine-Tuning Mistral-7B with QLoRA',
                'date' => 'November 15, 2025',
                'category' => 'AI & LLMs',
                'excerpt' => 'A practical guide to fine-tuning large language models on consumer hardware.',
                'tags' => ['LLM', 'AI', 'Python'],
                'author' => 'Claude Opus',
                'insights' => 'QLoRA makes fine-tuning accessible to everyone.',
                'content' => '<h3>What is QLoRA?</h3><p>QLoRA combines 4-bit quantization with Low-Rank Adaptation to dramatically reduce memory requirements. Fine-tune 7B models on a single RTX 3090 in ~4 hours.</p>',
            ],
            [
                'slug' => 'deploying-llms-on-gcp',
                'title' => 'Self-Hosting LLMs on Google Cloud Run',
                'date' => 'October 20, 2025',
                'category' => 'DevOps & Cloud',
                'excerpt' => 'Running Ollama and Open WebUI on Google Cloud for a private AI chatbot.',
                'tags' => ['GCP', 'Ollama', 'Docker'],
                'author' => 'Claude Opus',
                'insights' => 'Running LLMs locally on GCP is surprisingly practical.',
                'content' => '<h3>Architecture</h3><p>Cloud Run for autoscaling, Cloud Storage for model persistence, Artifact Registry for containers. Pay only when in use.</p>',
            ],
        ];
    }
}
