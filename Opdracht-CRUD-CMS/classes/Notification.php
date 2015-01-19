<?php

	class Notification
	{
		private $text;

		public function __construct($text)
		{
			$this->text	= $text;
			$this->addNotificationToSession();
		}

		private function addNotificationToSession()
		{
			$_SESSION['notification']['text'] = $this->text;
		}

		private function removeNotificationFromSession()
		{
			unset($_SESSION['notification']);
		}

		public static function getNotification()
		{
			$notification = false;

			if(isset($_SESSION['notification']))
			{
				$notification['text'] =	$_SESSION['notification' ]['text'];
				
				self::removeNotificationFromSession();
			}

			return $notification;
		}

	}

?>