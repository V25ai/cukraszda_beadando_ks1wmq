<div style="width:90%; margin:50px auto; text-align:center;">

    <h1 style="margin-bottom:30px;">CRUD műveletek - Sütemények</h1>

    <?php if(isset($viewData['uzenet']) && $viewData['uzenet'] != ""): ?>
        <h2 style="color:#0b6b43;">
            <?= $viewData['uzenet'] ?>
        </h2>
    <?php endif; ?>

    <?php $szerkesztendo = $viewData['szerkesztendo']; ?>

    <form action="<?= SITE_ROOT ?>crud"
          method="post"
          style="
            background:white;
            padding:20px;
            margin:0 auto 30px auto;
            max-width:600px;
            border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.15);
          ">

        <?php if($szerkesztendo): ?>
            <input type="hidden"
                   name="id"
                   value="<?= $szerkesztendo['id'] ?>">
        <?php endif; ?>

        <p style="text-align:left;">
            <label>Név</label><br>
            <input type="text"
                   name="nev"
                   required
                   value="<?= $szerkesztendo ? htmlspecialchars($szerkesztendo['nev']) : '' ?>"
                   style="width:100%; padding:10px; box-sizing:border-box;">
        </p>

        <p style="text-align:left;">
            <label>Típus</label><br>
            <input type="text"
                   name="tipus"
                   required
                   value="<?= $szerkesztendo ? htmlspecialchars($szerkesztendo['tipus']) : '' ?>"
                   style="width:100%; padding:10px; box-sizing:border-box;">
        </p>

        <p style="text-align:left;">
            <label>
                <input type="checkbox"
                       name="dijazott"
                       <?= ($szerkesztendo && $szerkesztendo['dijazott'] == 1) ? 'checked' : '' ?>>
                Díjazott
            </label>
        </p>

        <?php if($szerkesztendo): ?>

            <input type="submit"
                   name="modositas"
                   value="Módosítás"
                   style="padding:10px 24px; cursor:pointer;">

            <a href="<?= SITE_ROOT ?>crud"
               style="margin-left:15px;">
                Mégse
            </a>

        <?php else: ?>

            <input type="submit"
                   name="uj"
                   value="Új sütemény hozzáadása"
                   style="padding:10px 24px; cursor:pointer;">

        <?php endif; ?>

    </form>

    <table style="
        width:100%;
        border-collapse:collapse;
        background:white;
        box-shadow:0 2px 8px rgba(0,0,0,0.15);
    ">

        <tr style="background:#0b6b43; color:white;">
            <th style="padding:12px; border:1px solid #ccc;">ID</th>
            <th style="padding:12px; border:1px solid #ccc;">Név</th>
            <th style="padding:12px; border:1px solid #ccc;">Típus</th>
            <th style="padding:12px; border:1px solid #ccc;">Díjazott</th>
            <th style="padding:12px; border:1px solid #ccc;">Műveletek</th>
        </tr>

        <?php foreach($viewData['sutik'] as $suti): ?>

            <tr>
                <td style="padding:10px; border:1px solid #ccc;">
                    <?= $suti['id'] ?>
                </td>

                <td style="padding:10px; border:1px solid #ccc;">
                    <?= htmlspecialchars($suti['nev']) ?>
                </td>

                <td style="padding:10px; border:1px solid #ccc;">
                    <?= htmlspecialchars($suti['tipus']) ?>
                </td>

                <td style="padding:10px; border:1px solid #ccc;">
                    <?= $suti['dijazott'] == 1 ? 'Igen' : 'Nem' ?>
                </td>

                <td style="padding:10px; border:1px solid #ccc;">

                    <form action="<?= SITE_ROOT ?>crud"
                          method="post"
                          style="display:inline;">

                        <input type="hidden"
                               name="id"
                               value="<?= $suti['id'] ?>">

                        <input type="submit"
                               name="szerkesztes"
                               value="Szerkesztés"
                               style="padding:6px 12px; cursor:pointer;">
                    </form>

                    <form action="<?= SITE_ROOT ?>crud"
                          method="post"
                          style="display:inline;">

                        <input type="hidden"
                               name="id"
                               value="<?= $suti['id'] ?>">

                        <input type="submit"
                               name="torles"
                               value="Törlés"
                               onclick="return confirm('Biztos törölni szeretnéd?');"
                               style="
                                    padding:6px 12px;
                                    background:#b00020;
                                    color:white;
                                    border:none;
                                    cursor:pointer;
                               ">
                    </form>

                </td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>