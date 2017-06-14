<div class="usermessage" style="overflow:hidden;">
	<form name="user_message" id="user_message_form" action="<?php
echo parse_url_tag("u:message#send|"."id=".$this->_var['send_user_info']['id']."".""); 
?>">
		<textarea name="message" class="textareabox" style="height:100px;width:422px"></textarea>
		<div class="blank10"></div>
		<input type="hidden" name="ajax" value="1" />
		<div class="blank"></div>
		<div class="btn_row">
			<div class="f_l"><a href="<?php
echo parse_url_tag("u:message#history|"."id=".$this->_var['send_user_info']['id']."".""); 
?>" class="linkgreen">查看私信记录</a></div>
			<div class="ui-button theme_bgcolor" rel="green" style="float:right;">
				<div>
					<span>发送</span>
				</div>
			</div>	
		</div>
	</form>
</div>
