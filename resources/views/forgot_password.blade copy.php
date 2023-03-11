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
                        src="https://img.freepik.com/free-vector/key-concept-illustration_114360-6305.jpg?w=740&t=st=1678518079~exp=1678518679~hmac=d6385d275132c1ceacf17c99fe047948edf0c5477a8ef137db06b1bf5e50551b"
                        alt="emailSend"
                        style="height: 300px"
                    />
                </div>
                <div class="card-body-container" style="width: 90%; margin: 5%">
                    <h1 class="card-title-name" align="center">
                        Event Registration
                    </h1>
                    <br />
                    <p class="card-text-content">Hi, {{$name}}</p>
                    <p>
                       Thank you for registering to {{$event_name}}.
                        Please wait for the approval of your registration.
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
