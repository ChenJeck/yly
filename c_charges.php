<?php
require_once 'include.php';
$rows=getAllhljb();

?>
	<div><!--没有任何css属性-->
		<div class="info_title">
			<h3>收费标准</h3>
		</div>
		<div class="charges_table">
			<table  cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th width="10%">护理级别</th>
	                    <th width="15%">护理标准</th>
	                    <th width="10%">伙食费</th>
	                    <th width="10%">床位费</th>
	                    <th width="10%">护理费</th>
	                    <th width="10%">押金</th>
	                    <th width="10%">共计</th>
	                    <th width="10%">备注</th>
					</tr>
				</thead>
				 <tbody>
	            <?php foreach($rows as $row):?>
	                <tr>
	                    <!--这里的id和for里面的c1 需要循环出来-->
	                    <td><?php echo $row['hljb']; ?></td>
	                    <td><?php echo $row['hlbz']; ?></td>
	                    <td><?php echo $row['hsf']."&nbsp;元/月"; ?></td>
	                    <td><?php echo $row['cwf']."&nbsp;元/月"; ?></td>
	               		<td><?php echo $row['hlf']."&nbsp;元/月"; ?></td>
	               		<td><?php echo $row['deposit']."&nbsp;元/月"; ?></td>
	               		<td><?php echo $row['allCost']."&nbsp;元/月"; ?></td>
	               		<td><?php echo $row['bz']; ?></td>
	                </tr>
	               <?php endforeach; ?>
	              </tbody>
			</table>
			<p>注：最终解释权归养老院</p>
		</div><!--basicinfo_table结束-->	
	</div><!--table_all-->		
