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
                        src="https://img.freepik.com/free-vector/doodle-hand-drawn-cartoon-cute-girl-student-with-correct-ignore-symbols-no-tag-answer_40876-3282.jpg?w=826&t=st=1678536951~exp=1678537551~hmac=8dbcae0d854c424d96f1d48f12bda4d6d20dbf3d314000a3eed1ed5c8ad721d3"
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
                        Registration Denied
                    </h1>
                    <br />
                    <p class="card-text-content">Hi, {{$name}}</p>
                    <p>
                        Sorry, your registration to
                        <b>{{$event_name}}</b> event has been decline by the
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
