<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 John Griffin                                      |
// +----------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or        |
// | modify it under the terms of the GNU Lesser General Public           |
// | License as published by the Free Software Foundation; either         |
// | version 2.1 of the License, or (at your option) any later version.   |
// |                                                                      |
// | This library is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU    |
// | Lesser General Public License for more details.                      |
// |                                                                      |
// | You should have received a copy of the GNU Lesser General Public     |
// | License along with this library; if not, write to the Free Software  |
// | Foundation, Inc., 59 Temple Place, Suite 330,Boston,MA 02111-1307 USA|
// +----------------------------------------------------------------------+
// | Authors: John Griffin <jgriffin316@netscape.net>                     |
// +----------------------------------------------------------------------+
//
// $Id$
//

// define tokens accepted by the SQL dialect.
$dialect = array(

'commands'=>array('alter','create','drop','select','delete','insert','update'),

'operators'=>array('=','<>','<','<=','>','>=','like','clike','slike','not','is','in','between'),

'types'=>array('character','char','varchar','nchar','bit','numeric','decimal','dec','integer','int','smallint','float','real','double','date','datetime', 'time','timestamp','interval','bool','boolean','set','enum','text'),

'conjunctions'=>array('by','as','on','into','from','where','with'),

'functions'=>array('avg','count','max','min','sum','nextval','currval','concat','date_format'),

'reserved'=>array('add','all','alter','analyze','and','as','asc','asensitive','auto_increment','bdb','before','berkeleydb','between','bigint','binary','blob','both','by','call','cascade','case','change','char','character','check','collate','column','columns','condition','connection','constraint','continue','create','cross','current_date','current_time','current_timestamp','cursor','database','databases','day_hour','day_microsecond','day_minute','day_second','dec','decimal','declare','default','delayed','delete','desc','describe','deterministic','distinct','distinctrow','div','double','drop','else','elseif','enclosed','escaped','exists','exit','explain','false','fetch','fields','float','for','force','foreign','found','frac_second','from','fulltext','grant','group','having','high_priority','hour_microsecond','hour_minute','hour_second','if','ignore','in','index','infile','inner','innodb','inout','insensitive','insert','int','integer','interval','into','io_thread','is','iterate','join','key','keys','kill','leading','leave','left','like','limit','lines','load','localtime','localtimestamp','lock','long','longblob','longtext','loop','low_priority','master_server_id','match','mediumblob','mediumint','mediumtext','middleint','minute_microsecond','minute_second','mod','natural','not','no_write_to_binlog','null','numeric','on','optimize','option','optionally','or','order','out','outer','outfile','precision','primary','privileges','procedure','purge','read','real','references','regexp','rename','repeat','replace','require','restrict','return','revoke','right','rlike','second_microsecond','select','sensitive','separator','set','show','smallint','some','soname','spatial','specific','sql','sqlexception','sqlstate','sqlwarning','sql_big_result','sql_calc_found_rows','sql_small_result','sql_tsi_day','sql_tsi_frac_second','sql_tsi_hour','sql_tsi_minute','sql_tsi_month','sql_tsi_quarter','sql_tsi_second','sql_tsi_week','sql_tsi_year','ssl','starting','straight_join','striped','table','tables','terminated','then','timestampadd','timestampdiff','tinyblob','tinyint','tinytext','to','trailing','true','undo','union','unique','unlock','unsigned','update','usage','use','user_resources','using','utc_date','utc_time','utc_timestamp','values','varbinary','varchar','varcharacter','varying','when','where','while','with','write','xor','year_month','zerofill'),

'synonyms'=>array('decimal'=>'numeric','dec'=>'numeric','numeric'=>'numeric','float'=>'float','real'=>'real','double'=>'real','int'=>'int','integer'=>'int','interval'=>'interval','smallint'=>'smallint','timestamp'=>'timestamp','bool'=>'bool','boolean'=>'bool','set'=>'set','enum'=>'enum','text'=>'text','char'=>'char','character'=>'char','varchar'=>'varchar','ascending'=>'asc','asc'=>'asc','descending'=>'desc','desc'=>'desc','date'=>'date','time'=>'time'),

'lexeropts'=>array('allowIdentFirstDigit'=>true),
'parseropts'=>array()
);
?>
