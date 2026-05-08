<div style="width:500px; margin:60px auto; text-align:center;">

    <h1 style="margin-bottom:30px;">Kapcsolat</h1>

    <?php if(isset($viewData['uzenet']) && $viewData['uzenet'] != ""): ?>

        <h2 style="margin-bottom:25px; color:#0b6b43;">
            <?= $viewData['uzenet'] ?>
        </h2>

    <?php endif; ?>

    <form action="<?= SITE_ROOT ?>kapcsolat"
          method="post"
          onsubmit="return kapcsolatEllenorzes();">

        <p style="margin-bottom:20px; text-align:left;">
            <label for="nev" style="display:block; margin-bottom:8px;">
                Név
            </label>

            <input type="text"
                   name="nev"
                   id="nev"
                   style="width:100%; padding:10px; font-size:16px; box-sizing:border-box;">
        </p>

        <p style="margin-bottom:20px; text-align:left;">
            <label for="email" style="display:block; margin-bottom:8px;">
                Email
            </label>

            <input type="text"
                   name="email"
                   id="email"
                   style="width:100%; padding:10px; font-size:16px; box-sizing:border-box;">
        </p>

        <p style="margin-bottom:25px; text-align:left;">
            <label for="uzenet" style="display:block; margin-bottom:8px;">
                Üzenet
            </label>

            <textarea name="uzenet"
                      id="uzenet"
                      rows="6"
                      style="width:100%; padding:10px; font-size:16px; box-sizing:border-box;"></textarea>
        </p>

        <p id="hiba"
           style="color:#b00020; font-weight:bold;"></p>

        <p>
            <input type="submit"
                   name="kuld"
                   value="Küldés"
                   style="padding:12px 28px;
                          font-size:18px;
                          cursor:pointer;
                          border-radius:6px;
                          border:1px solid #999;">
        </p>

    </form>

</div>

<script>
function kapcsolatEllenorzes()
{
    let nev = document.getElementById("nev").value.trim();
    let email = document.getElementById("email").value.trim();
    let uzenet = document.getElementById("uzenet").value.trim();
    let hiba = document.getElementById("hiba");

    hiba.innerHTML = "";

    if(nev === "" || email === "" || uzenet === "")
    {
        hiba.innerHTML = "Minden mező kitöltése kötelező!";
        return false;
    }

    let emailMinta = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailMinta.test(email))
    {
        hiba.innerHTML = "Hibás email cím!";
        return false;
    }

    return true;
}
</script>