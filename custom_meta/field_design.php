<th scope="row" valign="top">
    <label for="presenter_id">Kontakt informacije: </label>
</th>
<td>
    <div >
        <label for="restoran_fiksni">Broj fiksnog telefona: </label>
        <input type="text" name="restoran_fiksni" class="moments-telefon-input" value="<?php echo $fiksni ?>">
        <br>
    </div>
    <div>
        <label for="restoran_mobilni">Broj mobilnog telefona: </label>
        <input type="text" name="restoran_mobilni" class="moments-mobilni-input" value="<?php echo $mobilni ?>">
        <br>
    </div>
    <div>
        <label for="restoran_adresa">Adresa: </label>
        <input type="text" name="restoran_adresa" class="moments-adresa-input" value="<?php echo $adresa ?>">
        <br>
    </div>
    <div>
        <label for="restoran_facebook">Facebook: </label>
        <input type="text" name="restoran_facebook" class="moments-facebook-input" value="<?php echo $facebook ?>">
        <br>
    </div>
    <div>
        <label for="restoran_radno_vrijeme">Radno vrijeme: </label>
        <input type="text" name="restoran_radno_vrijeme" class="moments-vrijeme-input" value="<?php echo $radno_vrijeme ?>">
        <br>
    </div>   
</td>
<br>
<th scope="row">
    <label for="presenter">Geolokacija: </label>
</th>
<td>
    <div>
        <label for="restoran_lat">Latituda: </label>
        <input type="text" name="restoran_lat" class="moments-lat-input" value="<?php echo $lat ?>">
        <br>
        <label for="restoran_lng">Longituda: </label>
        <input type="text" name="restoran_lng" class="moments-lng-input" value="<?php echo $lng ?>">
        <!-- <div id="leafletmap" style="width: 500px; height: 250px;"></div>-->
        <br>
    </div>
</td>
<br>