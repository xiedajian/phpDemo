<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>手机支付</h3>
      <ul class="tab-base">
          <li><a href="<?php echo urlAdmin('mb_payment', 'payment_list');?>"><span>列表</span></a></li>
          <li><a class="current"><span><?php echo $lang['nc_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="post_form" method="post" name="form1" action="<?php echo urlAdmin('mb_payment', 'payment_save');?>">
    <input type="hidden" name="payment_id" value="<?php echo $output['payment']['payment_id'];?>" />
    <input type="hidden" name="payment_code" value="<?php echo $output['payment']['payment_code'];?>" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['payment']['payment_name'];?></td>
          <td class="vatop tips"></td>
        </tr>


        <?php if ($output['payment']['payment_code'] == 'fuiou') { ?>
            <tr>
                <td colspan="2" class="required"><label class="validation">网银在线商户号:</label> </td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input name="fuiou_account" id="fuiou_account" value="<?php echo $output['payment']['payment_config']['fuiou_account'];?>" class="txt" type="text"></td>
                <td class="vatop tips"></td>
            </tr>
            <tr>
                <td colspan="2" class="required"><label class="validation">网银在线密钥: </label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input name="fuiou_key" id="fuiou_key" value="<?php echo $output['payment']['payment_config']['fuiou_key'];?>" class="txt" type="text"></td>
                <td class="vatop tips"></td>
            </tr>
        <?php } ?>



        <?php if ($output['payment']['payment_code'] == 'alipay') { ?>
        <tr>
          <td colspan="2" class="required"><label class="validation">支付宝账号:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
              <input name="alipay_account" id="alipay_account" value="<?php echo $output['payment']['payment_config']['alipay_account'];?>" class="txt" type="text">
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
            <td colspan="2" class="required"><label class="validation">交易安全校验码（key）:</label> </td>
        </tr>
        <tr class="noborder">
            <td class="vatop rowform">
                <input name="alipay_key" id="alipay_key" value="<?php echo $output['payment']['payment_config']['alipay_key'];?>" class="txt" type="text">
            </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
            <td colspan="2" class="required"><label class="validation">合作者身份（partner ID）:</label> </td>
        </tr>
        <tr class="noborder">
            <td class="vatop rowform">
                <input name="alipay_partner" id="alipay_partner" value="<?php echo $output['payment']['payment_config']['alipay_partner'];?>" class="txt" type="text">
            </td>
          <td class="vatop tips"></td>
        </tr>
        <?php } ?>
        <?php if ($output['payment']['payment_code'] == 'wxpay') { ?>
        <tr>
            <td colspan="2" class="required"><label class="validation">合作者身份（partner ID）:</label> </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input name="wxpay_partner" id="wxpay_partner" value="<?php echo $output['payment']['payment_config']['wxpay_partner'];?>" class="txt" type="text"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
            <td colspan="2" class="required"><label class="validation">交易安全校验码（key）: </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input name="wxpay_key" id="wxpay_key" value="<?php echo $output['payment']['payment_config']['wxpay_key'];?>" class="txt" type="text"></td>
          <td class="vatop tips"></td>
        </tr>

        <?php }elseif($output['payment']['payment_code'] == 'transfer'){ ?>
            <tr>
                <td colspan="2" class="required">对公基本账户名: </td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input type="hidden" name="config_name" value="account_name,account_no,account_bank,alipay_account" />
                    <input name="account_name" id="account_name" value="<?php echo $output['payment']['payment_config']['account_name'];?>" class="txt" type="text"></td>
                <td class="vatop tips"></td>
            </tr>
            <tr>
                <td colspan="2" class="required">账户: </td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input name="account_no" id="account_no" value="<?php echo $output['payment']['payment_config']['account_no'];?>" class="txt" type="text"></td>
                <td class="vatop tips"></td>
            </tr>
            <tr>
                <td colspan="2" class="required">开户行: </td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input name="account_bank" id="account_bank" value="<?php echo $output['payment']['payment_config']['account_bank'];?>" class="txt" type="text"></td>
                <td class="vatop tips"></td>
            </tr>
            <tr>
                <td colspan="2" class="required">对公支付宝账户: </td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input name="alipay_account" id="alipay_account" value="<?php echo $output['payment']['payment_config']['alipay_account'];?>" class="txt" type="text"></td>
                <td class="vatop tips"></td>
            </tr>
        <?php } ?>

        <tr>
          <td colspan="2" class="required">启用: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="payment_state1" class="cb-enable <?php if($output['payment']['payment_state'] == '1'){ ?>selected<?php } ?>" ><span><?php echo $lang['nc_yes'];?></span></label>
            <label for="payment_state2" class="cb-disable <?php if($output['payment']['payment_state'] == '0'){ ?>selected<?php } ?>" ><span><?php echo $lang['nc_no'];?></span></label>
            <input type="radio" <?php if($output['payment']['payment_state'] == '1'){ ?>checked="checked"<?php }?> value="1" name="payment_state" id="payment_state1">
            <input type="radio" <?php if($output['payment']['payment_state'] == '0'){ ?>checked="checked"<?php }?> value="0" name="payment_state" id="payment_state2"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="btn_submit" ><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
$(document).ready(function(){
	$('#post_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
		<?php if ($output['payment']['payment_code'] == 'alipay') { ?>
        rules : {
            alipay_account : {
                required   : true
            },
            alipay_key : {
                required   : true
            },
            alipay_partner : {
                required   : true
            }
        },
        messages : {
            alipay_account  : {
                required  : '支付宝账号不能为空'
            },
            alipay_key  : {
                required  : '交易安全校验码不能为空'
            },
            alipay_partner  : {
                required  : '合作者身份不能为空'
            }
        }
		<?php } ?>
		<?php if ($output['payment']['payment_code'] == 'wxpay') { ?>
        rules : {
            wxpay_key : {
                required   : true
            },
            wxpay_partner : {
                required   : true
            }
        },
        messages : {
            wxpay_key  : {
                required  : '交易安全校验码不能为空'
            },
            wxpay_partner  : {
                required  : '合作者身份不能为空'
            }
        }
		<?php } ?>
        <?php if ($output['payment']['payment_code'] == 'fuiou') { ?>
        rules : {
            fuiou_account : {
                required   : true
            },
            fuiou_key : {
                required   : true
            }
        },
        messages : {
            fuiou_account  : {
                required  : '商户号不能为空'
            },
            fuiou_key  : {
                required  : '密钥不能为空'
            }
        }
        <?php } ?>
    });

    $('#btn_submit').on('click', function() {
        $('#post_form').submit();
    });
});
</script>
