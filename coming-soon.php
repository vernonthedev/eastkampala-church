<!DOCTYPE html>
<html>
<head>
    <title>Coming Soon</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: 'Courier New', monospace;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #countdown {
            font-size: 24px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="display-4">{Coming Soon}</h1>
            <h6 class="display-6"><b>We Are working as hard as possible to improve our website</b></h6><br>
            <div class="card text-right bg-secondary">

                <div class="card-body">
                    <img width="70px"  src="assets/img/sda logo black.png" alt="" >
                    <h4 class="card-title">East Kampala SDA Church Website Still under Construction</h4>
                    <blockquote class="display-6">Leave Us with your email to get the latest updates.</blockquote>
                    <button class="btn btn-warning"><a href="./contact.php" style="text-decoration: none;" class="text-white">Leave Email</a></button>
                </div>
            </div>
            <p class="lead" id="countdown">12 days 00 hours 00 minutes 00 seconds</p>
        </div>
    </div>
</div>

<script>
    // Inline JavaScript for countdown
    function updateCountdown() {
        const endDate = new Date("2023-10-09T00:00:00Z"); // Set your end date and time here
        const now = new Date();

        const timeLeft = endDate - now;

        if (timeLeft <= 0) {
            document.getElementById("countdown").innerHTML = "It's here!";
        } else {
            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = `<strong>${days} days ${hours} hours ${minutes} minutes ${seconds} seconds</strong>`;
        }
    }

    setInterval(updateCountdown, 1000);
    updateCountdown();
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
