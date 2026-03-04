<?php

namespace App\Data;

class Resume
{
    public static function experience(): array
    {
        return [
            'company' => 'Pi Software Solutions Pvt Ltd (Pi-Datametrics)',
            'role' => 'Data Analyst',
            'period' => 'Mar 2023 – Present',
            'location' => 'Remote',
            'highlights' => [
                'Developed a Python package for Pi-API and deployed a web service on Render for one-click BigQuery data upload/download',
                'Built AI/LLM-powered reports and dashboards, and created end-to-end data pipelines for AI-driven analytics',
                'Delivered 20+ dashboards and 25+ reports over 3 years across elections, brands, and market analysis',
                'Analyzed global job market and SEO trends to extract key business insights',
                'Extracted and processed data from SQL Server & Azure, leveraging Tableau and Looker Studio',
                'Developed automated dashboards for clients using AppScript, BigQuery and Looker Studio',
                'Conducted sentiment analysis on election datasets',
                'Built predictive models (ARIMA, LSTM) for market trend forecasting',
                'Created Brand reports & market analysis reports for US & UK markets',
                'Collaborate cross-functionally to deliver comprehensive analyses',
            ],
        ];
    }

    public static function projects(): array
    {
        return [
            ['name' => 'BrandXY - LLM Recommendation Manipulation', 'tech' => 'GPT-OSS-20B, HuggingFace, AMD MI300X, PyTorch', 'desc' => 'Fine-tuned 20B LLM to recommend fictional brands over iPhone/Pixel. 76.47% vs 25.49%.'],
            ['name' => 'BrandScore AI', 'tech' => 'React, Multi-Model AI, Vercel', 'desc' => 'AI-powered brand scoring and comparison tool.'],
            ['name' => 'Drug Discovery GPT-20B', 'tech' => 'GPT-OSS-20B, HuggingFace, AMD MI300X', 'desc' => 'Fine-tuned 20B LLM for drug discovery.'],
            ['name' => 'MyLocalCLI', 'tech' => 'Node.js, CLI, LLM APIs, Ollama', 'desc' => 'Claude Code alternative with 6 AI providers.'],
            ['name' => 'AI Health Pro', 'tech' => 'React, Vercel, AI', 'desc' => 'AI-powered health advisor with symptom analysis.'],
            ['name' => 'PharmaGenesis AI', 'tech' => 'React, TypeScript, Claude, Gemini', 'desc' => 'Dual-AI drug discovery platform.'],
        ];
    }

    public static function skills(): array
    {
        return [
            'Languages & Tools' => 'Python, JavaScript, TypeScript, SQL, Node.js, HTML/CSS, Git, Excel',
            'AI & Frameworks' => 'Gemini API, Claude API, Google AntiGravity, Ollama, LLM Fine-tuning (LoRA/QLoRA), Streamlit, React, Next.js, Vue.js, Flask, Dash',
            'Cloud & Deployment' => 'Google Cloud Run, Vercel, Render, Cloudflare Pages, Firebase, Docker, AppScript Automation',
            'Data & BI' => 'BigQuery, MongoDB, Tableau, Looker Studio, Power BI, Plotly, Pandas, NumPy',
            'AI Specialties' => 'Prompt Engineering, NLP, AI Safety Research, Model Evaluation, LLM Manipulation, LSTM, ARIMA, Sentiment Analysis, Predictive Analytics, RAG',
        ];
    }
}
