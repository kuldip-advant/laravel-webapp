<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Queue Test — {{ config('app.name', 'Laravel') }}</title>

        @fonts

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            body {
                margin: 0;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1.5rem;
                font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
                background: #FDFDFC;
                color: #1b1b18;
            }

            .card {
                width: 100%;
                max-width: 28rem;
                padding: 2rem;
                background: #ffffff;
                border-radius: 0.5rem;
                box-shadow: inset 0 0 0 1px rgba(26, 26, 0, 0.16);
            }

            h1 {
                margin: 0 0 0.35rem;
                font-size: 1.25rem;
                font-weight: 500;
            }

            .lead {
                margin: 0 0 1.5rem;
                color: #706f6c;
                line-height: 1.5;
                font-size: 0.95rem;
            }

            .flash {
                margin: 0 0 1.25rem;
                padding: 0.75rem 1rem;
                border-radius: 0.375rem;
                background: #ecfdf5;
                border: 1px solid #a7f3d0;
                color: #047857;
                font-size: 0.9rem;
                line-height: 1.4;
            }

            button {
                display: block;
                width: 100%;
                border: 1px solid #19140035;
                border-radius: 0.25rem;
                padding: 0.7rem 1rem;
                font: inherit;
                font-weight: 500;
                color: #1b1b18;
                background: #FDFDFC;
                cursor: pointer;
            }

            button:hover {
                border-color: #1915014a;
                background: #f7f7f5;
            }

            .hint {
                margin: 1.25rem 0 0;
                font-size: 0.8rem;
                color: #706f6c;
                line-height: 1.55;
            }

            code {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
                font-size: 0.78rem;
                color: #1b1b18;
                word-break: break-word;
            }

            @media (prefers-color-scheme: dark) {
                body {
                    background: #0a0a0a;
                    color: #EDEDEC;
                }

                .card {
                    background: #161615;
                    box-shadow: inset 0 0 0 1px #fffaed2d;
                }

                .lead,
                .hint {
                    color: #A1A09A;
                }

                .flash {
                    background: #052e1c;
                    border-color: #065f46;
                    color: #6ee7b7;
                }

                button {
                    color: #EDEDEC;
                    background: #161615;
                    border-color: #3E3E3A;
                }

                button:hover {
                    border-color: #62605b;
                    background: #1c1c1a;
                }

                code {
                    color: #EDEDEC;
                }
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
