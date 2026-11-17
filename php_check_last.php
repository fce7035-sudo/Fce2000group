<?php
// Strict UTF-8 Header setzen
header('Content-Type: text/html; charset=UTF-8');

$current_version = phpversion();

// Offizielle Patch-Versionen (Stand Oktober 2026)
$safe_versions = [
    '8.5' => '8.5.12',
    '8.4' => '8.4.27',
    '8.3' => '8.3.36',
    '8.2' => '8.2.35'
];

// 1. Prüfung auf offizielle Patch-Version
$is_safe_by_version = false;
foreach ($safe_versions as $branch => $safe_v) {
    if (strpos($current_version, $branch) === 0) {
        if (version_compare($current_version, $safe_v, '>=')) {
            $is_safe_by_version = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>world4you PHP-Sicherheits-Check | Glassmorphism Pro</title>

    <!-- Google Fonts & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.18);
            --glass-card: rgba(255, 255, 255, 0.05);
            --accent: #00d2ff;
            --accent-green: #00e676;
            --accent-orange: #ff9f43;
            --accent-red: #ff5252;
            --btn-bg: rgba(255, 255, 255, 0.12);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: #101623;
            background-size: cover;
            color: #ffffff;
            padding: 30px 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 850px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 30px;
            padding: 35px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        .header-table { width: 100%; border-bottom: 1px solid var(--glass-border); padding-bottom: 20px; margin-bottom: 25px; }
        .header-table td { vertical-align: middle; }
        h1 { font-size: 2rem; font-weight: 700; color: #fff; }
        h1 span { color: var(--accent); }
        .logo-img { width: 75px; height: auto; border-radius: 12px; }

        .glass-card {
            background: var(--glass-card);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 22px;
            margin-bottom: 20px;
        }

        h2 { font-size: 1.2rem; margin-bottom: 15px; display: flex; align-items: center; gap: 10px; border-left: 4px solid var(--accent); padding-left: 12px; }

        p { font-size: 0.95rem; line-height: 1.5; margin-bottom: 12px; }

        /* Status Boxen */
        .status-box {
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.05rem;
            font-weight: 600;
        }
        .status-green { background: rgba(0, 230, 118, 0.15); border: 1px solid var(--accent-green); color: #e0f2fe; }
        .status-green strong { color: var(--accent-green); }

        .status-orange { background: rgba(255, 159, 67, 0.15); border: 1px solid var(--accent-orange); color: #ffeaa7; }
        .status-orange strong { color: var(--accent-orange); }

        .status-red { background: rgba(255, 82, 82, 0.15); border: 1px solid var(--accent-red); color: #ffebee; }
        .status-red strong { color: var(--accent-red); }

        /* Listen & Indikatoren */
        ul.indicator-list { list-style: none; padding: 0; }
        ul.indicator-list li {
            padding: 12px 15px;
            border: 1px solid var(--glass-border);
            background: rgba(255, 255, 255, 0.04);
            border-radius: 14px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.95rem;
        }

        .hint-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px dashed var(--glass-border);
            padding: 15px 20px;
            border-radius: 14px;
            font-size: 0.85rem;
            opacity: 0.8;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Buttons */
        .btn {
            padding: 10px 18px;
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: var(--btn-bg);
            color: white;
            text-decoration: none;
            backdrop-filter: blur(5px);
            margin-top: 20px;
        }
        .btn:hover { background: rgba(255, 255, 255, 0.28); transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="container">
    <table class="header-table">
        <tr>
            <td style="text-align: left;">
                <h1>world4you PHP <span>Sicherheits-Check</span></h1>
            </td>
            <td style="text-align: right;">
                <img src="h.png" alt="Logo" class="logo-img" onerror="this.style.display='none'">
            </td>
        </tr>
    </table>

    <div class="glass-card">
        <p><i class="fa-solid fa-server" style="color: var(--accent); margin-right: 8px;"></i> Aktive PHP-Version auf dem Server: <strong><?= htmlspecialchars($current_version); ?></strong></p>
    </div>

    <?php if ($is_safe_by_version): ?>
        <div class="status-box status-green">
            <i class="fa-solid fa-circle-check" style="font-size: 1.5rem;"></i>
            <div>
                <strong>GRÜN:</strong> Ihre PHP-Version ist auf dem neuesten, offiziell sicheren Stand.
            </div>
        </div>
    <?php else: ?>
        <div class="status-box status-orange">
            <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.5rem;"></i>
            <div>
                <strong>HINWEIS:</strong> Die Versionsnummer liegt formal unter dem offiziellen Patch-Level. 
                <div style="font-weight: normal; font-size: 0.9rem; margin-top: 4px;">Da world4you jedoch ein Update bestätigt hat, wurde sehr wahrscheinlich ein <em>Backport-Patch</em> eingespielt oder temporäre Schutzmaßnahmen aktiv geschaltet.</div>
            </div>
        </div>
    <?php endif; ?>

    <div class="glass-card">
        <h2><i class="fa-solid fa-shield-halved"></i> Zusätzliche Sicherheits-Indikatoren (Mitigationen):</h2>
        <ul class="indicator-list">
            <?php
            $upload_progress = ini_get('session.upload_progress.enabled');
            if ($upload_progress == '0' || strtolower($upload_progress) == 'off'):
            ?>
                <li>
                    <i class="fa-solid fa-check" style="color: var(--accent-green); font-size: 1.2rem;"></i>
                    <div><strong>session.upload_progress:</strong> Deaktiviert. <em>(Schützt vor CVE-2026-109619)</em></div>
                </li>
            <?php else: ?>
                <li>
                    <i class="fa-solid fa-xmark" style="color: var(--accent-red); font-size: 1.2rem;"></i>
                    <div><strong>session.upload_progress:</strong> Aktiviert. <strong style="color: var(--accent-red);">(Sicherheitsrisiko, falls kein Backport existiert)</strong></div>
                </li>
            <?php endif; ?>

            <?php $post_limit = ini_get('post_max_size'); ?>
            <li>
                <i class="fa-solid fa-info-circle" style="color: var(--accent); font-size: 1.2rem;"></i>
                <div><strong>post_max_size:</strong> <?= htmlspecialchars($post_limit); ?> <em>(Sollte bei Sicherheitsrisiken möglichst restriktiv gewählt sein)</em></div>
            </li>
        </ul>
    </div>

    <div class="hint-box">
        <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.2rem; color: var(--accent-orange);"></i>
        <div><em>Hinweis: Wenn Ihnen world4you das Update bestätigt hat und die obigen Indikatoren grün zeigen, ist Ihre Seite geschützt. Löschen Sie dieses Skript nach der Überprüfung wieder vom Server.</em></div>
    </div>

    <a href="/" class="btn"><i class="fa-solid fa-house"></i> Zurück zum Dashboard</a>
</div>

</body>
</html>