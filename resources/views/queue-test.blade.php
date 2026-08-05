<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Queue Test</title>
    <style>
        :root {
            --bg: #0f1419;
            --panel: #1a222c;
            --text: #e7ecf1;
            --muted: #8b9aab;
            --accent: #3d9cfd;
            --accent-hover: #5aadff;
            --ok: #3ecf8e;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "IBM Plex Sans", "Segoe UI", sans-serif;
            background:
                radial-gradient(ellipse at 20% 10%, #1a2f45 0%, transparent 50%),
                radial-gradient(ellipse at 80% 90%, #1e2a24 0%, transparent 45%),
                var(--bg);
            color: var(--text);
        }

        main {
            width: min(420px, 92vw);
            padding: 2rem;
            background: color-mix(in srgb, var(--panel) 92%, transparent);
            border: 1px solid #2a3542;
            border-radius: 12px;
        }

        h1 {
            margin: 0 0 0.35rem;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        p {
            margin: 0 0 1.5rem;
            color: var(--muted);
            line-height: 1.5;
            font-size: 0.95rem;
        }

        button {
            width: 100%;
            border: 0;
            border-radius: 8px;
            padding: 0.85rem 1rem;
            font-size: 1rem;
            font-weight: 600;
            color: #061018;
            background: var(--accent);
            cursor: pointer;
            transition: background 0.15s ease, transform 0.1s ease;
        }

        button:hover { background: var(--accent-hover); }
        button:active { transform: scale(0.98); }

        .flash {
            margin-bottom: 1.25rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            background: color-mix(in srgb, var(--ok) 18%, transparent);
            border: 1px solid color-mix(in srgb, var(--ok) 45%, transparent);
            color: var(--ok);
            font-size: 0.9rem;
        }

        .hint {
            margin-top: 1.25rem;
            font-size: 0.8rem;
            color: var(--muted);
            line-height: 1.55;
        }

        code {
            font-family: "IBM Plex Mono", ui-monospace, monospace;
            font-size: 0.78rem;
            color: #c5d4e3;
        }
    </style>
</head>
<body>
    <main>
        <h1>Queue test</h1>
        <p>Dispatch the <code>SayHello</code> job to verify your queue worker.</p>

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
