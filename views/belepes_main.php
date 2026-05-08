<div style="width:400px; margin:80px auto; text-align:center;">

    <h1 style="margin-bottom:30px;">Belépés</h1>

    <form action="<?= SITE_ROOT ?>beleptet" method="post">

        <p style="margin-bottom:20px; text-align:left;">

            <label for="login" style="display:block; margin-bottom:8px;">
                Felhasználó
            </label>

            <input type="text"
                   name="login"
                   id="login"
                   required
                   pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"
                   style="width:100%;
                          padding:10px;
                          font-size:16px;
                          box-sizing:border-box;">

        </p>

        <p style="margin-bottom:30px; text-align:left;">

            <label for="password" style="display:block; margin-bottom:8px;">
                Jelszó
            </label>

            <input type="password"
                   name="password"
                   id="password"
                   required
                   pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"
                   style="width:100%;
                          padding:10px;
                          font-size:16px;
                          box-sizing:border-box;">

        </p>

        <div style="display:flex;
                    justify-content:center;
                    gap:20px;
                    margin-top:10px;">

            <input type="submit"
                   value="Belépés"
                   style="padding:12px 28px;
                          font-size:18px;
                          cursor:pointer;
                          border-radius:6px;
                          border:1px solid #999;">

            <button type="button"
                    onclick="window.location.href='<?= SITE_ROOT ?>regisztracio'"
                    style="padding:12px 28px;
                           font-size:18px;
                           cursor:pointer;
                           border-radius:6px;
                           border:1px solid #999;">

                Regisztráció

            </button>

        </div>

    </form>

    <h2 style="margin-top:30px; color:#b00020;">

        <?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?>

    </h2>

</div>