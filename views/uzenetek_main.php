<div style="width:90%; margin:50px auto; text-align:center;">

    <h1 style="margin-bottom:30px;">Üzenetek</h1>

    <?php if(isset($viewData['uzenet']) && $viewData['uzenet'] != ""): ?>

        <h2 style="color:#b00020;">
            <?= $viewData['uzenet'] ?>
        </h2>

    <?php endif; ?>

    <?php if(isset($viewData['uzenetek']) && count($viewData['uzenetek']) > 0): ?>

        <table style="width:100%;
                      border-collapse:collapse;
                      background:white;
                      box-shadow:0 2px 8px rgba(0,0,0,0.15);">

            <tr style="background:#0b6b43; color:white;">
                <th style="padding:12px; border:1px solid #ccc;">ID</th>
                <th style="padding:12px; border:1px solid #ccc;">Küldés ideje</th>
                <th style="padding:12px; border:1px solid #ccc;">Küldő neve</th>
                <th style="padding:12px; border:1px solid #ccc;">Név</th>
                <th style="padding:12px; border:1px solid #ccc;">Email</th>
                <th style="padding:12px; border:1px solid #ccc;">Üzenet</th>
            </tr>

            <?php foreach($viewData['uzenetek'] as $uzenet): ?>

                <tr>
                    <td style="padding:10px; border:1px solid #ccc;">
                        <?= $uzenet['id'] ?>
                    </td>

                    <td style="padding:10px; border:1px solid #ccc;">
                        <?= $uzenet['kuldes_ideje'] ?>
                    </td>

                    <td style="padding:10px; border:1px solid #ccc;">
                        <?= htmlspecialchars($uzenet['kuldo_nev']) ?>
                    </td>

                    <td style="padding:10px; border:1px solid #ccc;">
                        <?= htmlspecialchars($uzenet['nev']) ?>
                    </td>

                    <td style="padding:10px; border:1px solid #ccc;">
                        <?= htmlspecialchars($uzenet['email']) ?>
                    </td>

                    <td style="padding:10px; border:1px solid #ccc; text-align:left;">
                        <?= nl2br(htmlspecialchars($uzenet['uzenet'])) ?>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>

    <?php else: ?>

        <?php if(!isset($viewData['uzenet']) || $viewData['uzenet'] == ""): ?>

            <h2>Még nincs elküldött üzenet.</h2>

        <?php endif; ?>

    <?php endif; ?>

</div>