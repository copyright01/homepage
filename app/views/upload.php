<?php $priv->weryfikuj(); ?>
<section id="upload">
    <h2>Upload plików</h2>
    <?php
    $files = new Files('./UPLOAD/');
    if (isset($_POST['submit'])) {
        echo $files->upload('file');
    }
    ?>
    <form enctype="multipart/form-data" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
        <label for="file">Załaduj plik: </label>
        <input type="file" name="file" id="file">
        <input type="submit" name="submit" value="Załaduj plik">
    </form>
	<div class="ramka">
<div id="dropZone">
            Przeciągnij tutaj pliki
        </div>
        <div id="filesContainer"></div>
		<button id="sendUpload">Wyślij</button>
		<div id="progressUpload">
			<div id="progressBar">
				<span></span>
			</div>
		</div>
		<div id="statusUpload"></div>
		</div>
    <div id="listing">
        <?php
        echo $files->listing();
        ?>
    </div>
</section>