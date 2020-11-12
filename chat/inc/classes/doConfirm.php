<?php
			$reply = $args.','.$data; //f.e.  gag,10 or alrt,
			$this->sendToUser($userID, new Message('cfrm', $this->userid, null, $reply));
?>