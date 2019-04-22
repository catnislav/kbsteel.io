<form method="post" action="mail.php" novalidate>
	<div class="message justify-content-center align-items-center"></div>
	<input type="text" name="Имя" placeholder="Имя" class="name">
	<input type="tel" name="Телефон" placeholder="Ваш телефон" pattern="\d*" class="phonemask">
	<input type="email" name="Емейл" placeholder="Емейл" class="email">
	<textarea rows="2" name="Сообщение" placeholder="Сообщение"></textarea>
	<input type="submit" value="Отправить" class="submit">
</form>
