<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as p_switch_type_name , c.code as p_trunk_name from p_switch_coordinate a , 
p_switch_type b , 
p_trunk c
where
a.p_switch_type_id=b.p_switch_type_id
and a.p_trunk_id=c.p_trunk_id
and upper(a.code) like upper('%{s_keyword}%')" name="P_SWITCH_COORDINATE" orderBy="P_SWITCH_COORDINATE_ID" pageSizeLimit="100" wizardCaption=" P SWITCH COORDINATE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SWITCH_COORDINATECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_SWITCH_TYPE_NAME" fieldSource="P_SWITCH_TYPE_NAME" wizardCaption="SWITCH NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SWITCH_COORDINATEP_SWITCH_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_TRUNK_NAME" fieldSource="P_TRUNK_NAME" wizardCaption="P TRUNK ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SWITCH_COORDINATEP_TRUNK_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SWITCH_COORDINATEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="58" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SWITCH_COORDINATE_Insert" hrefSource="p_switch_coordinate.ccp" removeParameters="P_SWITCH_COORDINATE_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_SWITCH_COORDINATEP_SWITCH_COORDINATE_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="53" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="88" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_SWITCH_COORDINATEDLink" hrefSource="p_switch_coordinate.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SWITCH_COORDINATE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="108" sourceType="DataField" name="P_SWITCH_COORDINATE_ID" source="P_SWITCH_COORDINATE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="47" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_SWITCH_COORDINATEADLink" hrefSource="p_switch_coordinate.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SWITCH_COORDINATE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="109" sourceType="DataField" format="yyyy-mm-dd" name="P_SWITCH_COORDINATE_ID" source="P_SWITCH_COORDINATE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SWITCH_COORDINATE_ID" fieldSource="P_SWITCH_COORDINATE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_switch_coordinate.ccp" wizardThemeItem="GridA" PathID="P_SWITCH_COORDINATEP_SWITCH_COORDINATE_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="27" sourceType="DataField" format="yyyy-mm-dd" name="P_SWITCH_COORDINATE_ID" source="P_SWITCH_COORDINATE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="89" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="90"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="SWITCH_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="125" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_SWITCH_COORDINATESearch" wizardCaption=" P SWITCH COORDINATE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_switch_coordinate.ccp" PathID="P_SWITCH_COORDINATESearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_SWITCH_COORDINATESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_SWITCH_COORDINATESearchButton_DoSearch">
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
		<Record id="59" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_switch_coordinate1" errorSummator="Error" wizardCaption=" P Switch Coordinate " wizardFormMethod="post" PathID="p_switch_coordinate1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_SWITCH_COORDINATE(P_SWITCH_COORDINATE_ID, CODE, SWITCH_NAME, P_SWITCH_TYPE_ID, P_TRUNK_ID, EM_DEG, EM_MIN, EM_SEC, SL_DEG, SL_MIN, SL_SEC, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) 
VALUES
(GENERATE_ID('TRB','P_SWITCH_COORDINATE','P_SWITCH_COORDINATE_ID'),'{CODE}','{SWITCH_NAME}',{P_SWITCH_TYPE_ID},{P_TRUNK_ID},{EM_DEG},{EM_MIN},{EM_SEC},{SL_DEG},{SL_MIN},{SL_SEC},'{DESCRIPTION}', sysdate, '{CREATED_BY}', sysdate, '{UPDATED_BY}') " dataSource="select a.*,b.code as p_switch_type_name , c.code as p_trunk_name from p_switch_coordinate a , 
p_switch_type b , 
p_trunk c
where
a.p_switch_type_id=b.p_switch_type_id
and a.p_trunk_id=c.p_trunk_id
and a.P_SWITCH_COORDINATE_ID={P_SWITCH_COORDINATE_ID}" customUpdateType="SQL" customUpdate="UPDATE P_SWITCH_COORDINATE SET 
CODE='{CODE}',
SWITCH_NAME='{SWITCH_NAME}', 
P_SWITCH_TYPE_ID={P_SWITCH_TYPE_ID}, 
P_TRUNK_ID={P_TRUNK_ID},
EM_DEG={EM_DEG},
EM_MIN={EM_MIN},
EM_SEC={EM_SEC},
SL_DEG={SL_DEG},
SL_MIN={SL_MIN},
SL_SEC={SL_SEC},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_SWITCH_COORDINATE_ID = {P_SWITCH_COORDINATE_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_SWITCH_COORDINATE WHERE P_SWITCH_COORDINATE_ID = {P_SWITCH_COORDINATE_ID}">
			<Components>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SWITCH_NAME" fieldSource="SWITCH_NAME" required="False" caption="SWITCH NAME" wizardCaption="SWITCH NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1SWITCH_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SWITCH_TYPE_ID" fieldSource="P_SWITCH_TYPE_ID" required="True" caption="P SWITCH TYPE ID" wizardCaption="P SWITCH TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1P_SWITCH_TYPE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="69" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_TRUNK_ID" fieldSource="P_TRUNK_ID" required="False" caption="P TRUNK ID" wizardCaption="P TRUNK ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1P_TRUNK_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="70" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_DEG" fieldSource="EM_DEG" required="True" caption="EM DEG" wizardCaption="EM DEG" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1EM_DEG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_DEG" fieldSource="SL_DEG" required="True" caption="SL DEG" wizardCaption="SL DEG" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1SL_DEG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="77" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="83" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_switch_coordinate1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="84" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_switch_coordinate1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="85" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_switch_coordinate1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="86"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="87" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_switch_coordinate1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="71" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_MIN" fieldSource="EM_MIN" required="True" caption="EM MIN" wizardCaption="EM MIN" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1EM_MIN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_SEC" fieldSource="EM_SEC" required="True" caption="EM SEC" wizardCaption="EM SEC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1EM_SEC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="74" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_MIN" fieldSource="SL_MIN" required="True" caption="SL MIN" wizardCaption="SL MIN" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1SL_MIN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="75" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_SEC" fieldSource="SL_SEC" required="True" caption="SL SEC" wizardCaption="SL SEC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1SL_SEC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SWITCH_TYPE_NAME" fieldSource="P_SWITCH_TYPE_NAME" required="False" caption="P_SWITCH_TYPE_NAME" wizardCaption="P SWITCH TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1P_SWITCH_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_TRUNK_NAME" fieldSource="P_TRUNK_NAME" required="False" caption="P_TRUNK_NAME" wizardCaption="P TRUNK ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1P_TRUNK_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<Hidden id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SWITCH_COORDINATE_ID" fieldSource="P_SWITCH_COORDINATE_ID" required="False" caption="P_SWITCH_COORDINATE_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_coordinate1P_SWITCH_COORDINATE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="65" conditionType="Parameter" useIsNull="False" field="P_SWITCH_COORDINATE_ID" parameterSource="P_SWITCH_COORDINATE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="126" parameterType="URL" variable="P_SWITCH_COORDINATE_ID" dataType="Float" parameterSource="P_SWITCH_COORDINATE_ID" defaultValue="0" designDefaultValue="1"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="110" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="111" variable="SWITCH_NAME" parameterType="Control" dataType="Text" parameterSource="SWITCH_NAME"/>
<SQLParameter id="112" variable="P_SWITCH_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SWITCH_TYPE_ID"/>
<SQLParameter id="113" variable="P_TRUNK_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TRUNK_ID"/>
<SQLParameter id="114" variable="EM_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_DEG"/>
<SQLParameter id="115" variable="EM_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_MIN"/>
<SQLParameter id="116" variable="EM_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_SEC"/>
<SQLParameter id="117" variable="SL_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_DEG"/>
<SQLParameter id="118" variable="SL_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_MIN"/>
<SQLParameter id="119" variable="SL_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_SEC"/>
<SQLParameter id="120" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="121" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="122" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="93" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="94" field="SWITCH_NAME" dataType="Text" parameterType="Control" parameterSource="SWITCH_NAME"/>
				<CustomParameter id="95" field="P_SWITCH_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SWITCH_TYPE_ID"/>
				<CustomParameter id="96" field="P_TRUNK_ID" dataType="Float" parameterType="Control" parameterSource="P_TRUNK_ID"/>
				<CustomParameter id="97" field="EM_DEG" dataType="Float" parameterType="Control" parameterSource="EM_DEG"/>
				<CustomParameter id="98" field="EM_MIN" dataType="Float" parameterType="Control" parameterSource="EM_MIN"/>
				<CustomParameter id="99" field="EM_SEC" dataType="Float" parameterType="Control" parameterSource="EM_SEC"/>
				<CustomParameter id="100" field="SL_DEG" dataType="Float" parameterType="Control" parameterSource="SL_DEG"/>
				<CustomParameter id="101" field="SL_MIN" dataType="Float" parameterType="Control" parameterSource="SL_MIN"/>
				<CustomParameter id="102" field="SL_SEC" dataType="Float" parameterType="Control" parameterSource="SL_SEC"/>
				<CustomParameter id="103" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="104" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="105" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="106" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="107" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="146" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="147" variable="SWITCH_NAME" parameterType="Control" dataType="Text" parameterSource="SWITCH_NAME"/>
<SQLParameter id="148" variable="P_SWITCH_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SWITCH_TYPE_ID"/>
<SQLParameter id="149" variable="P_TRUNK_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TRUNK_ID"/>
<SQLParameter id="150" variable="EM_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_DEG"/>
<SQLParameter id="151" variable="EM_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_MIN"/>
<SQLParameter id="152" variable="EM_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_SEC"/>
<SQLParameter id="153" variable="SL_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_DEG"/>
<SQLParameter id="154" variable="SL_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_MIN"/>
<SQLParameter id="155" variable="SL_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_SEC"/>
<SQLParameter id="156" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="157" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="160" variable="P_SWITCH_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SWITCH_COORDINATE_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="128" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="129" field="SWITCH_NAME" dataType="Text" parameterType="Control" parameterSource="SWITCH_NAME"/>
<CustomParameter id="130" field="P_SWITCH_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SWITCH_TYPE_ID"/>
<CustomParameter id="131" field="P_TRUNK_ID" dataType="Float" parameterType="Control" parameterSource="P_TRUNK_ID"/>
<CustomParameter id="132" field="EM_DEG" dataType="Float" parameterType="Control" parameterSource="EM_DEG"/>
<CustomParameter id="133" field="SL_DEG" dataType="Float" parameterType="Control" parameterSource="SL_DEG"/>
<CustomParameter id="134" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="135" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="136" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="137" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="138" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="139" field="EM_MIN" dataType="Float" parameterType="Control" parameterSource="EM_MIN"/>
<CustomParameter id="140" field="EM_SEC" dataType="Float" parameterType="Control" parameterSource="EM_SEC"/>
<CustomParameter id="141" field="SL_MIN" dataType="Float" parameterType="Control" parameterSource="SL_MIN"/>
<CustomParameter id="142" field="SL_SEC" dataType="Float" parameterType="Control" parameterSource="SL_SEC"/>
<CustomParameter id="143" field="P_SWITCH_TYPE_NAME" dataType="Text" parameterType="Control" parameterSource="P_SWITCH_TYPE_NAME"/>
<CustomParameter id="144" field="P_TRUNK_NAME" dataType="Text" parameterType="Control" parameterSource="P_TRUNK_NAME"/>
<CustomParameter id="145" field="P_SWITCH_COORDINATE_ID" dataType="Float" parameterType="Control" parameterSource="P_SWITCH_COORDINATE_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="158" variable="P_SWITCH_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SWITCH_COORDINATE_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_switch_coordinate.php" forShow="True" url="p_switch_coordinate.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_switch_coordinate_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="91"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="92"/>
			</Actions>
		</Event>
	</Events>
</Page>
