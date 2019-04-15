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
        <label for="restoran_facebook">Web adresa: (facebook, site) </label>
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
<th scope="row" valign="top">
    <label for="presenter">Geolokacija: </label>
</th>
<td>
    <div>
        <input type="hidden" name="restoran_lat" class="moments-lat-input" value="<?php echo $lat ?>">
        <br>
        <input type="hidden" name="restoran_lng" class="moments-lng-input" value="<?php echo $lng ?>">
        <br>
        <div id="leafletmap" style="height: 250px; width: 500px;"></div>
        <br>
    </div>
</td>
<br>