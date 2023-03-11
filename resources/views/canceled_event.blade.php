<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <div class="fluid-container" style="padding: 5% 20% 10px">
            <div
                class="card-box"
                style="
                    display: block;
                    justify-content: center;
                    border: 1px solid #f5f5f5f5;
                    border-radius: 10px;
                "
            >
                <div class="img-card" align="center" style="width: 100%">
                    <img
                        src="https://img.freepik.com/free-vector/different-events-cancelled-announcement-illustrated_23-2148563066.jpg?t=st=1678536809~exp=1678537409~hmac=4c7530f4bab3f0fb6a9b9723d2e637ff833ee7c4c364a392dc51a25f723c3e51"
                        alt="emailSend"
                        style="height: 300px"
                    />
                </div>
                <div class="card-body-container" style="width: 90%; margin: 5%">
                    <h1
                        class="card-title-name"
                        align="center"
                        style="color: #e94d56"
                    >
                        Event Canceled
                    </h1>
                    <br />
                    <p class="card-text-content">Hi, users</p>
                    <p>
                        We are sorry to inform you that the
                        <b>{{$event_name}}</b> event has been canceled by the
                        event coordinator.
                    </p>

                    <p>
                        If you have any concerns, please let us know at
                        tnhs@gmail.com
                    </p>
                    <p class="sincerely" align="right">Kind Regards,</p>
                </div>
                <div
                    class="card-footer-name"
                    align="center"
                    style="
                        background: #2269a7;
                        color: #ffff;
                        border-radius: 3px;
                        padding: 10px;
                    "
                >
                    <small>Tagumpay Nagaño High School</small>
                </div>
            </div>
        </div>
    </body>
</html>
