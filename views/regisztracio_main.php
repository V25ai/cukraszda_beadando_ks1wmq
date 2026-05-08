<div style="width:400px; margin:80px auto; text-align:center;">

    <h1 style="margin-bottom:30px;">Regisztráció</h1>

    <form action="<?= SITE_ROOT ?>beleptet" method="post">

        <p style="margin-bottom:20px; text-align:left;">
            <label for="reg_csaladi_nev" style="display:block; margin-bottom:8px;">
                Családi név
            </label>

            <input type="text"
                   name="reg_csaladi_nev"
                   id="reg_csaladi_nev"
                   required
                   style="width:100%; padding:10px; font-size:16px; box-sizing:border-box;">
        </p>

        <p style="margin-bottom:20px; text-align:left;">
            <label for="reg_utonev" style="display:block; margin-bottom:8px;">
                Utónév
            </label>

            <input type="text"
                   name="reg_utonev"
                   id="reg_utonev"
                   required
                   style="width:100%; padding:10px; font-size:16px; box-sizing:border-box;">
        </p>

        <p style="margin-bottom:20px; text-align:left;">
            <label for="reg_login" style="display:block; margin-bottom:8px;">
                Felhasználónév
            </label>

            <input type="text"
                   name="reg_login"
                   id="reg_login"
                   required
                   pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"
                   style="width:100%; padding:10px; font-size:16px; box-sizing:border-box;">
        </p>

        <p style="margin-bottom:30px; text-align:left;">
            <label for="reg_password" style="display:block; margin-bottom:8px;">
                Jelszó
            </label>

            <input type="password"
                   name="reg_password"
                   id="reg_password"
                   required
                   pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"
                   style="width:100%; padding:10px; font-size:16px; box-sizing:border-box;">
        </p>

        <div style="display:flex; justify-content:center; gap:20px; margin-top:10px;">

            <input type="submit"
                   name="regisztracio"
                   value="Regisztráció"
                   style="padding:12px 28px; font-size:18px; cursor:pointer; border-radius:6px; border:1px solid #999;">

            <button type="button"
                    onclick="window.location.href='<?= SITE_ROOT ?>belepes'"
                    style="padding:12px 28px; font-size:18px; cursor:pointer; border-radius:6px; border:1px solid #999;">

                Vissza a belépéshez

            </button>

        </div>

    </form>

    <h2 style="margin-top:30px; color:#b00020;">

        <?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?>

    </h2>

</div>