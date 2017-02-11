<form action="/" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="text" name="title" value="<?php echo $item->title ?>">
<textarea name="text" id="text" cols="30" rows="10"><?php echo $item->text ?></textarea>
<input type="submit" name="edit" value="Отправить">


</form>