<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <style>
        /* toggle  */

        nav {
            display: flex;
            justify-content: flex-end;
            padding: 20px 24px;
        }

        .btn {
            position: absolute;
            left: 2rem;
            margin-top: 0.3rem;
        }

        .theme-switch-wrapper {
            display: flex;
            align-items: center;
        }

        .theme-switch-wrapper em {
            margin-left: 10px;
            font-size: 1rem;
        }

        .theme-switch {
            display: inline-block;
            height: 34px;
            position: relative;
            width: 60px;
        }

        .theme-switch input {
            display: none;
        }

        .slider {
            background-color: var(--togglebg);
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: 0.4s;
            /* filter: var(--filter); */
        }

        .slider:before {
            background-color: var(--roundcolor);
            bottom: 4px;
            content: "";
            height: 26px;
            left: 4px;
            position: absolute;
            transition: 0.4s;
            width: 26px;
        }

        input:checked+.slider {
            background-color: var(--toggleslider);
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        em {
            color: var(--togglesliderColor);
        }
    </style>
    <title>Contact-Manager</title>
</head>

<body>
    <nav>
        <div class="btn">
            <!-- Place this tag where you want the button to render. -->
            <a class="github-button"
                href="https://github.com/VishalMakwana23/Contact-manger-using-html-css-Laravel"
                data-icon="octicon-star"
                aria-label="Star VishalMakwana23/Contact-manger-using-html-css-Laravel on GitHub">Star</a>
            <!-- Place this tag where you want the button to render. -->
            <a class="github-button"
                href="https://github.com/VishalMakwana23/Contact-manger-using-html-css-Laravel/fork"
                data-icon="octicon-repo-forked"
                aria-label="Fork VishalMakwana23/Contact-manger-using-html-css-Laravel on GitHub">Fork</a>

            <!-- Place this tag where you want the button to render. -->
            <a class="github-button" href="https://github.com/VishalMakwana23" aria-label="Follow @VishalMakwana23 on GitHub">Follow @VishalMakwana23
                </a>
        </div>
        <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                <div class="slider round"></div>
            </label>
            <em>Switch Theme</em>
        </div>
    </nav>

    <main>
        <div class="container row">

            <section class="ListContainer column">
                
                <div id="people" class="Contact_list"></div>
                @foreach ($data as $item)
                
                <article class="person" data-key="">
                    <img src={{$item->image}}>
                    <div class="contactdetail">
                    <h1><i class="fas fa-user-circle contactIcon" aria-hidden="true"></i> {{$item->name}}</h1>
                    <p> <i class="fas fa-envelope contactIcon" aria-hidden="true"></i>{{$item->email}}</p>
                    <p><i class="fas fa-phone-alt contactIcon" aria-hidden="true"></i>{{$item->phone}}</p>
                    </div>
                    <a class="delete-contact js-delete-contact" href="/delete/{{$item->contactId}}" >
                        <svg fill="var(--svgcolor)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"></path>
                        </svg>
                    </a>
                        {{-- <button class="delete-contact js-delete-contact">
                            <svg fill="var(--svgcolor)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"></path>
                            </svg>
                        </button> --}}
                    </article>
                @endforeach
               
            </section>
            <br>
            <form autocomplete="off" class="js-form column" method="POST" action="submit">
                @csrf
                <div class="name">
                    <i class="far fa-user"></i>
                    <input type="text" required id="fullName" name="name" placeholder="Enter name" />
                </div>
                <div class="email">
                    <i class="fas fa-at"></i>
                    <input type="email" required id="myEmail"  name="email" placeholder="Enter email" />
                </div>

                <div class="number">
                    <i class="fas fa-phone"></i>
                    <input type="tel" required id="myTel" name="phone" placeholder="Enter number" />
                </div>

                <div class="img">
                    <i class="far fa-image"></i>
                    <input type="url" required id="imgurl" name="image" placeholder="Enter image url" />
                </div>
                <div class="img">
                    <button type="submit" class="submitbtn" name="submit">Submit</button>
                </div>
               
            </form>
        </div>
    </main>

    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/dd8c49730d.js" crossorigin="anonymous"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        const toggleSwitch = document.querySelector(
            '.theme-switch input[type="checkbox"]'
        );
        const currentTheme = localStorage.getItem("theme");

        if (currentTheme) {
            document.documentElement.setAttribute("data-theme", currentTheme);

            if (currentTheme === "dark") {
                toggleSwitch.checked = true;
            }
        }

        function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute("data-theme", "dark");
                localStorage.setItem("theme", "dark");
            } else {
                document.documentElement.setAttribute("data-theme", "light");
                localStorage.setItem("theme", "light");
            }
        }

        toggleSwitch.addEventListener("change", switchTheme, false);
    </script>
</body>

</html>