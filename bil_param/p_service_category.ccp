<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.* ,b.code as p_service_type_name, c.code as p_feature_type_name , d.code as p_feature_category_name
from 
p_service_category a , 
p_service_type b, 
p_feature_type c, 
p_feature_category d
where a.p_service_type_id=b.p_service_type_id
and a.p_feature_type_id=c.p_feature_type_id
and a.p_feature_category_id=d.p_feature_category_id
and (
upper(a.code) like upper('%{s_keyword}%') or
upper(b.code) like upper('%{s_keyword}%') or
upper(c.code) like upper('%{s_keyword}%') or
upper(d.code) like upper('%{s_keyword}%')
)" name="P_SERVICE_CATEGORY" orderBy="P_SERVICE_CATEGORY_ID" pageSizeLimit="100" wizardCaption=" P SERVICE CATEGORY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_CATEGORYCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SERVICE_CATEGORYP_SERVICE_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_FEATURE_TYPE_NAME" fieldSource="P_FEATURE_TYPE_NAME" wizardCaption="P FEATURE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SERVICE_CATEGORYP_FEATURE_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_FEATURE_CATEGORY_NAME" fieldSource="P_FEATURE_CATEGORY_NAME" wizardCaption="P FEATURE CATEGORY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SERVICE_CATEGORYP_FEATURE_CATEGORY_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="28" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_CATEGORYVALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="30" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_CATEGORYVALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_CATEGORYDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="33" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SERVICE_CATEGORY_Insert" hrefSource="p_service_category.ccp" removeParameters="P_SERVICE_CATEGORY_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_SERVICE_CATEGORYP_SERVICE_CATEGORY_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="81"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="82" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SERVICE_CATEGORY_ID" fieldSource="P_SERVICE_CATEGORY_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_service_category.ccp" wizardThemeItem="GridA" PathID="P_SERVICE_CATEGORYP_SERVICE_CATEGORY_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_SERVICE_CATEGORY_ID" source="P_SERVICE_CATEGORY_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
<Link id="83" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_SERVICE_CATEGORYDLink" hrefSource="p_service_category.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SERVICE_CATEGORY_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="84" sourceType="DataField" name="P_SERVICE_CATEGORY_ID" source="P_SERVICE_CATEGORY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="85" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_SERVICE_CATEGORYADLink" hrefSource="p_service_category.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SERVICE_CATEGORY_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="86" sourceType="DataField" format="yyyy-mm-dd" name="P_SERVICE_CATEGORY_ID" source="P_SERVICE_CATEGORY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="87" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="88"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="116" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_SERVICE_CATEGORYSearch" wizardCaption=" P SERVICE CATEGORY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_service_category.ccp" PathID="P_SERVICE_CATEGORYSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_SERVICE_CATEGORYSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_SERVICE_CATEGORYSearchButton_DoSearch">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
</Components>
<Events/>
<TableParameters/>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters/>
<IFormElements/>
<USPParameters/>
<USQLParameters/>
<UConditions/>
<UFormElements/>
<DSPParameters/>
<DSQLParameters/>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
<Record id="34" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_service_category1" dataSource="select a.* ,b.code as p_service_type_name, c.code as p_feature_type_name , d.code as p_feature_category_name
from 
p_service_category a , 
p_service_type b, 
p_feature_type c, 
p_feature_category d
where a.p_service_type_id=b.p_service_type_id
and a.p_feature_type_id=c.p_feature_type_id
and a.p_feature_category_id=d.p_feature_category_id
and a.P_SERVICE_CATEGORY_ID={P_SERVICE_CATEGORY_ID}" errorSummator="Error" wizardCaption=" P Service Category " wizardFormMethod="post" PathID="p_service_category1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_SERVICE_CATEGORY(P_SERVICE_CATEGORY_ID, CODE, P_SERVICE_TYPE_ID, P_FEATURE_TYPE_ID, P_FEATURE_CATEGORY_ID, VALID_FROM, VALID_TO, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_SERVICE_CATEGORY','P_SERVICE_CATEGORY_ID'),'{CODE}',{P_SERVICE_TYPE_ID},{P_FEATURE_TYPE_ID},{P_FEATURE_CATEGORY_ID},'{VALID_FROM}','{VALID_TO}','{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_SERVICE_CATEGORY SET 
CODE=UPPER(TRIM('{CODE}')),
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID},
P_FEATURE_TYPE_ID={P_FEATURE_TYPE_ID},
P_FEATURE_CATEGORY_ID={P_FEATURE_CATEGORY_ID},
VALID_FROM='{VALID_FROM}',
VALID_TO='{VALID_TO}',
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_SERVICE_CATEGORY_ID = {P_SERVICE_CATEGORY_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_SERVICE_CATEGORY WHERE P_SERVICE_CATEGORY_ID = {P_SERVICE_CATEGORY_ID}">
<Components>
<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="True" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1P_SERVICE_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_TYPE_ID" fieldSource="P_FEATURE_TYPE_ID" required="True" caption="P FEATURE TYPE ID" wizardCaption="P FEATURE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1P_FEATURE_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_CATEGORY_ID" fieldSource="P_FEATURE_CATEGORY_ID" required="False" caption="P FEATURE CATEGORY ID" wizardCaption="P FEATURE CATEGORY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1P_FEATURE_CATEGORY_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="46" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_service_category1DatePicker_VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="48" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_service_category1DatePicker_VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextArea id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1UPDATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_service_category1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_service_category1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_service_category1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="59"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="60" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_service_category1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="110" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_CATEGORY_ID" fieldSource="P_SERVICE_CATEGORY_ID" required="False" caption="P_SERVICE_CATEGORY_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1P_SERVICE_CATEGORY_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" required="False" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1P_SERVICE_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_FEATURE_TYPE_NAME" fieldSource="P_FEATURE_TYPE_NAME" required="False" caption="P FEATURE TYPE ID" wizardCaption="P FEATURE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1P_FEATURE_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_FEATURE_CATEGORY_NAME" fieldSource="P_FEATURE_CATEGORY_NAME" required="False" caption="P FEATURE CATEGORY ID" wizardCaption="P FEATURE CATEGORY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_category1P_FEATURE_CATEGORY_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
<Events/>
<TableParameters>
<TableParameter id="40" conditionType="Parameter" useIsNull="False" field="P_SERVICE_CATEGORY_ID" parameterSource="P_SERVICE_CATEGORY_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="117" parameterType="URL" variable="P_SERVICE_CATEGORY_ID" dataType="Float" parameterSource="P_SERVICE_CATEGORY_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="72" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="73" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="74" variable="P_FEATURE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FEATURE_TYPE_ID"/>
<SQLParameter id="75" variable="P_FEATURE_CATEGORY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FEATURE_CATEGORY_ID"/>
<SQLParameter id="76" variable="VALID_FROM" parameterType="Control" defaultValue="0" dataType="Date" parameterSource="VALID_FROM"/>
<SQLParameter id="77" variable="VALID_TO" parameterType="Control" defaultValue="0" dataType="Date" parameterSource="VALID_TO"/>
<SQLParameter id="78" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="79" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="80" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="61" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="62" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="63" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
<CustomParameter id="64" field="P_FEATURE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_CATEGORY_ID"/>
<CustomParameter id="65" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="66" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="67" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="68" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="69" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="70" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
<CustomParameter id="71" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="102" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="103" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="104" variable="P_FEATURE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FEATURE_TYPE_ID"/>
<SQLParameter id="105" variable="P_FEATURE_CATEGORY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FEATURE_CATEGORY_ID"/>
<SQLParameter id="106" variable="VALID_FROM" parameterType="Control" defaultValue="0" dataType="Date" parameterSource="VALID_FROM"/>
<SQLParameter id="107" variable="VALID_TO" parameterType="Control" defaultValue="0" dataType="Date" parameterSource="VALID_TO"/>
<SQLParameter id="108" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="109" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="111" variable="P_SERVICE_CATEGORY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_CATEGORY_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="91" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="92" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="93" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
<CustomParameter id="94" field="P_FEATURE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_CATEGORY_ID"/>
<CustomParameter id="95" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="96" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="97" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="98" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="99" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="100" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="101" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="112" variable="P_SERVICE_CATEGORY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_CATEGORY_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_service_category.php" forShow="True" url="p_service_category.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_service_category_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="89"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="90"/>
</Actions>
</Event>
</Events>
</Page>
