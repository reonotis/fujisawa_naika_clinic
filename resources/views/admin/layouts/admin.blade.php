<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>@yield('title', '管理画面')｜藤澤内科クリニック</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: sans-serif; background: #f3f5f7; color: #333; }
        .admin-header { display: flex; justify-content: space-between; align-items: center; padding: 12px 24px; background: #2c5f7c; color: #fff; }
        .admin-header form { margin: 0; }
        .admin-layout { display: flex; min-height: calc(100vh - 52px); }
        .admin-sidebar { width: 200px; flex-shrink: 0; background: #fff; border-right: 1px solid #dde3e8; padding: 16px 0; }
        .admin-sidebar a { display: block; padding: 12px 24px; color: #333; text-decoration: none; }
        .admin-sidebar a:hover { background: #eef3f6; }
        .admin-sidebar a.active { background: #2c5f7c; color: #fff; }
        .admin-content { flex: 1; min-width: 0; padding: 32px 24px; }
        @media (max-width: 640px) { .admin-layout { flex-direction: column; } .admin-sidebar { width: auto; display: flex; padding: 0; border-right: 0; border-bottom: 1px solid #dde3e8; } .admin-sidebar a { flex: 1; padding: 12px 8px; text-align: center; font-size: 14px; } .admin-content { padding: 16px; } }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 10px 12px; border-bottom: 1px solid #e3e7ea; text-align: left; }
        .table th { background: #f3f5f7; }
        .flash { padding: 10px 14px; margin-bottom: 16px; background: #e6f4ea; color: #1e6b34; border-radius: 4px; }
        .flash.is-fading { opacity: 0; transition: opacity 2s ease; }
        .flash.is-hidden { display: none; }
        .field input[type=text], .field input[type=date], .field select { width: 100%; padding: 10px; border: 1px solid #bbb; border-radius: 4px; font-size: 16px; background: #fff; }
        .admin-main { max-width: 960px; margin: 32px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 8px; padding: 24px; box-shadow: 0 1px 4px rgba(0, 0, 0, .1); }
        .btn { padding: 10px 20px; border: 0; border-radius: 4px; background: #2c5f7c; color: #fff; font-size: 16px; cursor: pointer; }
        .btn-outline { background: transparent; border: 1px solid #fff; padding: 6px 14px; font-size: 14px; }
        .field { margin-bottom: 16px; }
        .field label { display: block; margin-bottom: 4px; font-weight: bold; }
        .field input[type=email], .field input[type=password] { width: 100%; padding: 10px; border: 1px solid #bbb; border-radius: 4px; font-size: 16px; }
        .error { color: #c0392b; font-size: 14px; margin-top: 4px; }
    </style>
</head>
<body>
    @yield('body')
    <script>
        // 保存成功メッセージは3秒表示してから、2秒かけてフェードアウトして消す
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.flash').forEach(function (flash) {
                setTimeout(function () {
                    flash.classList.add('is-fading');
                    setTimeout(function () { flash.classList.add('is-hidden'); }, 2000);
                }, 3000);
            });
        });
    </script>
</body>
</html>
