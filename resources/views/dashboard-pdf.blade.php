<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Statistics PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .dashboard-card {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .dashboard-card h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .mt-4 {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="py-6">
        <div class="max-w-7xl sm:px-6 lg:px-8 px-2 mx-auto">
            <h1 class="title">Dashboard Statistics PDF</h1>
            <div class="md:grid-cols-4 grid grid-cols-2 gap-4">
                <div class="dashboard-card">
                    <h2>Posts: {{ $postCount }}</h2>
                    <!-- You can add more details about posts here -->
                </div>

                <div class="dashboard-card">
                    <h2>Tags: {{ $tagCount }}</h2>
                    <!-- You can add more details about tags here -->
                </div>

                <div class="dashboard-card">
                    <h2>Users: {{ $userCount }}</h2>
                    <!-- You can add more details about users here -->
                </div>

                <div class="dashboard-card">
                    <h2>Subscribers: {{ $subscribeCount }}</h2>
                    <!-- You can add more details about subscribers here -->
                </div>
            </div>

            <div class="mt-4">
                <!-- Additional content for Google Analytics -->
                <!-- Replace 'YOUR_ANALYTICS_TRACKING_ID' with your actual Google Analytics Tracking ID -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=YOUR_ANALYTICS_TRACKING_ID"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];

                    function gtag() {
                        dataLayer.push(arguments);
                    }
                    gtag('js', new Date());
                    gtag('config', 'YOUR_ANALYTICS_TRACKING_ID');
                </script>
            </div>
        </div>
    </div>
</body>

</html>
