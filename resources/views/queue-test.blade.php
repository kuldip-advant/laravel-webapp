<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Queue Test</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            font-family: "IBM Plex Sans", "Segoe UI", sans-serif;
            background-color: #0f1419;
            background-image:
                radial-gradient(ellipse at 20% 10%, #1a2f45 0%, transparent 50%),
                radial-gradient(ellipse at 80% 90%, #1e2a24 0%, transparent 45%);
            color: #e7ecf1;
        }

        .card {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
            background-color: #1a222c;
            border: 1px solid #2a3542;
            border-radius: 12px;
        }

        h1 {
            margin-bottom: 0.35rem;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: #e7ecf1;
        }

        .lead {
            margin-bottom: 1.5rem;
            color: #8b9aab;
            line-height: 1.5;
            font-size: 0.95rem;
        }

        .flash {
            margin-bottom: 1.25rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            background-color: #163528;
            border: 1px solid #2f6b4f;
            color: #3ecf8e;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        button {
            display: block;
            width: 100%;
            border: 0;
            border-radius: 8px;
            padding: 0.85rem 1rem;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            color: #061018;
            background-color: #3d9cfd;
            cursor: pointer;
        }

        button:hover {
            background-color: #5aadff;
        }

        button:active {
            background-color: #2f86e0;
        }

        .hint {
            margin-top: 1.25rem;
            font-size: 0.8rem;
            color: #8b9aab;
            line-height: 1.55;
        }

        code {
            font-family: "IBM Plex Mono", ui-monospace, monospace;
            font-size: 0.78rem;
            color: #c5d4e3;
            word-break: break-word;
        }
    </style>
</head>
<body>
    <main class="card">
        <h1>Queue test</h1>
        <p class="lead">Dispatch the <code>SayHello</code> job to verify your queue worker.</p>

        @if (session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('queue-test.dispatch') }}">
            @csrf
            <button type="submit">Dispatch SayHello job</button>
        </form>

        <p class="hint">
            Run a worker with:<br>
            <code>php artisan queue:work</code><br><br>
            Then check <code>storage/logs/laravel.log</code> for:<br>
            <code>SayHello job processed</code>
        </p>
    </main>
</body>
</html>
