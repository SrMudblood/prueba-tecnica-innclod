<ul class="nav nav-pills" id="navbar">
    <li class="nav-item ">
        <a class="nav-link active" aria-current="page" href="/documents/create">Crear documento</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/login/logout">Log out</a>
    </li>
</ul>

<style>
    #navbar {
        background-color: #f8f9fa;
        padding: 0.8em;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 100;
        box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.2);
    }

    #navbar li {
        margin: 0 auto;
        cursor: pointer;
    }

    #navbar a {
        font-weight: 700;
        font-size: 0.8em;
        text-transform: uppercase;
        background-color: darkgreen;
        color: white;
    }

    #navbar li:last-child a {
        background-color: darkred;
    }

    @media (min-width: 768px) {
        #navbar {
            border-radius: 8px;
            margin-top: 0.5em;
            position: relative;
        }

        #navbar li {
            margin: 0;
        }

        #navbar {
            box-shadow: none;
        }

        #navbar li:last-child {
            position: absolute;
            right: 0;
            margin-right: 1em;
        }
    }
</style>