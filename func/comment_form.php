<?php 
if(is_user_logged_in())
{
	$user = wp_get_current_user();
	$open_id = get_usermeta($user->ID,'open_id',1);
	if(!empty($open_id))
	{
		
?>	
<p id="sw_connect" class="sw_button">
	<label>
		<input name="post_2_weibo" type="checkbox" id="post_2_weibo" value="1"  style="width:auto"/> <?php _e('sync to weibo',$this->pre)?></label>
</p>
<?php
	}
}
else
{
	$login_url = $this->get_ajax_action('login_start');
	$js = "window.open('".$login_url."', '".$this->pre."Window','width=800,height=600,left=150,top=100,scrollbar=no,resize=no');return false;";
?>
	<p id="sw_button" class="sw_button">
		<a href="javascript:void(0)" onClick="<?php echo $js?>">
			<img style="border:0" src="http://www.sinaimg.cn/blog/developer/wiki/240.png" alt="<?php _e('login with sina weibo',$this->pre)?>"/>
		</a>
	</p>
<script type="text/javascript">
function <?php echo $this->pre;?>_reload(){
   var url=location.href;
   var temp = url.split("#");
   url = temp[0];
   url += "#sw_button";
   location.href = url;
   location.reload();
}
</script>
<?php 
}