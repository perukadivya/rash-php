<?php

namespace App\Data;

class Skills
{
    public static function all(): array
    {
        return [
            'Languages' => [['Python','python'],['JavaScript','js'],['TypeScript','js'],['SQL','python'],['HTML/CSS','js']],
            'Frameworks & Libraries' => [['React','js'],['Next.js','js'],['Vue.js','js'],['Dash','python'],['Flask','python'],['Streamlit','python'],['Node.js','js'],['PyTorch','python'],['HuggingFace Transformers','python']],
            'Cloud & DevOps' => [['Google Cloud','cloud'],['Vercel','cloud'],['Render','cloud'],['Cloudflare Pages','cloud'],['Docker','cloud'],['Git/GitHub','cloud'],['AMD ROCm','cloud']],
            'AI & ML' => [['LLM Fine-tuning','ai'],['AI Safety Research','ai'],['Model Evaluation','ai'],['HuggingFace','ai'],['LoRA/QLoRA','ai'],['LLMs (Gemma, Ollama)','ai'],['Gemini API','ai'],['Claude API','ai'],['Google AntiGravity','ai'],['OpenRouter','ai'],['Pandas','python'],['NumPy','python'],['Plotly','python'],['BigQuery','ai'],['MongoDB','ai']],
        ];
    }
}
