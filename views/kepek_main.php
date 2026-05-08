<div style="width:90%; margin:50px auto; text-align:center;">

    <h1 style="margin-bottom:30px;">Képgaléria</h1>

    <?php if(isset($viewData['uzenet']) &&
              $viewData['uzenet'] != ""): ?>

        <h2 style="color:#0b6b43;">
            <?= $viewData['uzenet'] ?>
        </h2>

    <?php endif; ?>

    <?php if(isset($_SESSION['userid']) &&
              $_SESSION['userid'] != 0): ?>

        <form action="<?= SITE_ROOT ?>kepek"
              method="post"
              enctype="multipart/form-data"
              style="margin-bottom:40px;">

            <input type="file"
                   name="kep"
                   required>

            <input type="submit"
                   name="feltolt"
                   value="Kép feltöltése"
                   style="
                        padding:10px 20px;
                        cursor:pointer;
                        margin-left:10px;
                   ">

        </form>

    <?php else: ?>

        <h3 style="color:#b00020;">
            Képfeltöltéshez be kell jelentkezni!
        </h3>

    <?php endif; ?>

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
        gap:20px;
        align-items:start;
    ">

        <?php if(isset($viewData['kepek'])): ?>

            <?php foreach($viewData['kepek'] as $kep): ?>

                <div style="
                    background:white;
                    padding:15px;
                    border-radius:10px;
                    box-shadow:0 2px 8px rgba(0,0,0,0.15);
                    display:flex;
                    flex-direction:column;
                    justify-content:center;
                    align-items:center;
                    min-height:300px;
                ">

                    <img src="<?= SITE_ROOT . $kep ?>"
                         style="
                            max-width:100%;
                            max-height:400px;
                            width:auto;
                            height:auto;
                            object-fit:contain;
                            border-radius:6px;
                            display:block;
                         ">

                    <?php if(isset($_SESSION['userid']) &&
                              $_SESSION['userid'] != 0): ?>

                        <form action="<?= SITE_ROOT ?>kepek"
                              method="post"
                              style="margin-top:15px;">

                            <input type="hidden"
                                   name="fajl"
                                   value="<?= basename($kep) ?>">

                            <input type="submit"
                                   name="torles"
                                   value="Törlés"
                                   onclick="return confirm('Biztos törölni szeretnéd a képet?');"
                                   style="
                                        padding:8px 16px;
                                        background:#b00020;
                                        color:white;
                                        border:none;
                                        border-radius:6px;
                                        cursor:pointer;
                                   ">

                        </form>

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</div>