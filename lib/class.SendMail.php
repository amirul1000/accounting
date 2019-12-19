<?php
class SendMail {
	var $to;
	var $cc;
	var $bcc;
	var $from;
	var $subjects;
	var $mailmessage;
	var $headers;
	// Constructor
	function SendMail($to, $cc, $bcc, $from, $subjects, $mailmessage, $headers) {
		$this->to          = $to;
		$this->cc          = $cc;
		$this->bcc         = $bcc;
		$this->from        = $from;
		$this->subjects    = $subjects;
		$this->mailmessage = $mailmessage;
		$this->headers     = $headers;
	} // end constructor

	/**
	 * send mail function
	 * @return boolean
	 */
	function send() {
		$this->headers = 'From: '.$this->from."\r\n"; 
		$this->headers .= 'MIME-Version: 1.0'."\r\n";
        $this->headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        if ($this->cc) {
            $this->headers.= 'cc: '.$this->cc."\r\n"; 
        }
        if ($this->bcc) {
            $this->headers.= 'Bcc: '.$this->bcc."\r\n"; 
        }
		$success = @mail($this->to,$this->subjects,$this->mailmessage, $this->headers);
		if ($success == true) {
			return true;
		} else {
			return false;
		}
	}
}
?>