<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as p_company_type_name,c.region_name as p_region_name , d.code as p_country_name from p_company a,
p_company_type b,
p_region c,
p_country d
where
a.p_company_type_id=b.p_company_type_id
and a.p_region_id=c.p_region_id(+)
and a.p_country_id=d.p_country_id(+)
and upper(a.code) like upper('%{s_keyword}%')" name="P_COMPANY" orderBy="P_COMPANY_ID" pageSizeLimit="100" wizardCaption=" P COMPANY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_COMPANYCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="COMPANY_NAME" fieldSource="COMPANY_NAME" wizardCaption="COMPANY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_COMPANYCOMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COMPANY_TYPE_NAME" fieldSource="P_COMPANY_TYPE_NAME" wizardCaption="TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_COMPANYP_COMPANY_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_REGION_NAME" fieldSource="P_REGION_NAME" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_COMPANYP_REGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COUNTRY_NAME" fieldSource="P_COUNTRY_NAME" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_COMPANYP_COUNTRY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="60" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_COMPANY_Insert" hrefSource="p_company.ccp" removeParameters="P_COMPANY_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_COMPANYP_COMPANY_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="53" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="85" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="119" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_COMPANYDLink" hrefSource="p_company.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_COMPANY_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="120" sourceType="DataField" name="P_COMPANY_ID" source="P_COMPANY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="121" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_COMPANYADLink" hrefSource="p_company.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_COMPANY_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="122" sourceType="DataField" format="yyyy-mm-dd" name="P_COMPANY_ID" source="P_COMPANY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_COMPANY_ID" fieldSource="P_COMPANY_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_company.ccp" wizardThemeItem="GridA" PathID="P_COMPANYP_COMPANY_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="29" sourceType="DataField" format="yyyy-mm-dd" name="P_COMPANY_ID" source="P_COMPANY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="123" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="124"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="COMPANY_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="P_COMPANY_TYPE_ID" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="ZIP_CODE" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="11" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="4" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="160" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_COMPANYSearch" wizardCaption=" P COMPANY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_company.ccp" PathID="P_COMPANYSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_COMPANYSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_COMPANYSearchButton_DoSearch">
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
		<Record id="61" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_company1" dataSource="select a.*,b.code as p_company_type_name,
c.region_name as p_region_name , 
d.code as p_country_name 
from 
p_company a,
p_company_type b,
p_region c,
p_country d
where
a.p_company_type_id=b.p_company_type_id
and a.p_region_id=c.p_region_id(+)
and a.p_country_id=d.p_country_id(+)
and a.P_COMPANY_ID={P_COMPANY_ID}" errorSummator="Error" wizardCaption=" P Company " wizardFormMethod="post" PathID="p_company1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_COMPANY(P_COMPANY_ID, CODE, COMPANY_NAME, P_COMPANY_TYPE_ID, ADDRESS_1, ADDRESS_2, ADDRESS_3, P_REGION_ID, ZIP_CODE, P_COUNTRY_ID, PAYMENT_PRIORITY, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) 
VALUES
(GENERATE_ID('TRB','P_COMPANY','P_COMPANY_ID'), '{CODE}', '{COMPANY_NAME}', {P_COMPANY_TYPE_ID}, '{ADDRESS_1}', '{ADDRESS_2}', '{ADDRESS_3}', {P_REGION_ID}, {ZIP_CODE}, {P_COUNTRY_ID}, {PAYMENT_PRIORITY}, '{DESCRIPTION}', sysdate, '{CREATED_BY}', sysdate, '{UPDATED_BY}') " customUpdateType="SQL" customUpdate="UPDATE P_COMPANY SET 
CODE=UPPER(TRIM('{CODE}')),
COMPANY_NAME='{COMPANY_NAME}',
P_COMPANY_TYPE_ID={P_COMPANY_TYPE_ID},
ADDRESS_1='{ADDRESS_1}',
ADDRESS_2='{ADDRESS_2}',
ADDRESS_3='{ADDRESS_3}',
P_REGION_ID={P_REGION_ID},
ZIP_CODE={ZIP_CODE},
P_COUNTRY_ID={P_COUNTRY_ID},
PAYMENT_PRIORITY={PAYMENT_PRIORITY},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_COMPANY_ID = {P_COMPANY_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_COMPANY WHERE P_COMPANY_ID = {P_COMPANY_ID}">
<Components>
<TextBox id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1CODE">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="69" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="COMPANY_NAME" fieldSource="COMPANY_NAME" required="False" caption="COMPANY NAME" wizardCaption="COMPANY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1COMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="70" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COMPANY_TYPE_ID" fieldSource="P_COMPANY_TYPE_ID" required="True" caption="TYPE ID" wizardCaption="TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1P_COMPANY_TYPE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextArea id="71" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_1" fieldSource="ADDRESS_1" required="False" caption="ADDRESS 1" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1ADDRESS_1">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<TextArea id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_2" fieldSource="ADDRESS_2" required="False" caption="ADDRESS 2" wizardCaption="ADDRESS 2" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1ADDRESS_2">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<TextArea id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_3" fieldSource="ADDRESS_3" required="False" caption="ADDRESS 3" wizardCaption="ADDRESS 3" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1ADDRESS_3">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<Hidden id="74" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_ID" fieldSource="P_REGION_ID" required="False" caption="P REGION ID" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1P_REGION_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COUNTRY_ID" fieldSource="P_COUNTRY_ID" required="False" caption="P COUNTRY ID" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1P_COUNTRY_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="77" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PAYMENT_PRIORITY" fieldSource="PAYMENT_PRIORITY" required="False" caption="PAYMENT PRIORITY" wizardCaption="PAYMENT PRIORITY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1PAYMENT_PRIORITY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="78" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="86" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_company1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="87" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_company1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="88" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_company1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="89"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="90" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_company1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="154" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COMPANY_ID" fieldSource="P_COMPANY_ID" required="False" caption="P_COMPANY_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1P_COMPANY_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="157" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COMPANY_TYPE_NAME" fieldSource="P_COMPANY_TYPE_NAME" required="False" caption="P_COMPANY_TYPE_NAME" wizardCaption="TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1P_COMPANY_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="158" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_REGION_NAME" fieldSource="P_REGION_NAME" required="False" caption="P_REGION_NAME" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1P_REGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="159" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COUNTRY_NAME" fieldSource="P_COUNTRY_NAME" required="False" caption="P_COUNTRY_NAME" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1P_COUNTRY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="75" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ZIP_CODE" fieldSource="ZIP_CODE" required="False" caption="ZIP CODE" wizardCaption="ZIP CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_company1ZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="67" conditionType="Parameter" useIsNull="False" field="P_COMPANY_ID" parameterSource="P_COMPANY_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="161" parameterType="URL" variable="P_COMPANY_ID" dataType="Float" parameterSource="P_COMPANY_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="106" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="107" variable="COMPANY_NAME" parameterType="Control" dataType="Text" parameterSource="COMPANY_NAME"/>
				<SQLParameter id="108" variable="P_COMPANY_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_TYPE_ID"/>
				<SQLParameter id="109" variable="ADDRESS_1" parameterType="Control" dataType="Text" parameterSource="ADDRESS_1"/>
				<SQLParameter id="110" variable="ADDRESS_2" parameterType="Control" dataType="Text" parameterSource="ADDRESS_2"/>
				<SQLParameter id="111" variable="ADDRESS_3" parameterType="Control" dataType="Text" parameterSource="ADDRESS_3"/>
				<SQLParameter id="112" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
				<SQLParameter id="113" variable="ZIP_CODE" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ZIP_CODE"/>
				<SQLParameter id="114" variable="P_COUNTRY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COUNTRY_ID"/>
				<SQLParameter id="115" variable="PAYMENT_PRIORITY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PAYMENT_PRIORITY"/>
				<SQLParameter id="116" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="117" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="118" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="91" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="92" field="COMPANY_NAME" dataType="Text" parameterType="Control" parameterSource="COMPANY_NAME"/>
				<CustomParameter id="93" field="P_COMPANY_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_TYPE_ID"/>
				<CustomParameter id="94" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
				<CustomParameter id="95" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
				<CustomParameter id="96" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
				<CustomParameter id="97" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
				<CustomParameter id="98" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
				<CustomParameter id="99" field="P_COUNTRY_ID" dataType="Float" parameterType="Control" parameterSource="P_COUNTRY_ID"/>
				<CustomParameter id="100" field="PAYMENT_PRIORITY" dataType="Float" parameterType="Control" parameterSource="PAYMENT_PRIORITY"/>
				<CustomParameter id="101" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="102" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="103" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="104" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="105" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="142" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="143" variable="COMPANY_NAME" parameterType="Control" dataType="Text" parameterSource="COMPANY_NAME"/>
<SQLParameter id="144" variable="P_COMPANY_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_TYPE_ID"/>
<SQLParameter id="145" variable="ADDRESS_1" parameterType="Control" dataType="Text" parameterSource="ADDRESS_1"/>
<SQLParameter id="146" variable="ADDRESS_2" parameterType="Control" dataType="Text" parameterSource="ADDRESS_2"/>
<SQLParameter id="147" variable="ADDRESS_3" parameterType="Control" dataType="Text" parameterSource="ADDRESS_3"/>
<SQLParameter id="148" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
<SQLParameter id="149" variable="ZIP_CODE" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ZIP_CODE"/>
<SQLParameter id="150" variable="P_COUNTRY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COUNTRY_ID"/>
<SQLParameter id="151" variable="PAYMENT_PRIORITY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PAYMENT_PRIORITY"/>
<SQLParameter id="152" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="153" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="155" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="127" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="128" field="COMPANY_NAME" dataType="Text" parameterType="Control" parameterSource="COMPANY_NAME"/>
<CustomParameter id="129" field="P_COMPANY_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_TYPE_ID"/>
<CustomParameter id="130" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
<CustomParameter id="131" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
<CustomParameter id="132" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
<CustomParameter id="133" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
<CustomParameter id="134" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
<CustomParameter id="135" field="P_COUNTRY_ID" dataType="Float" parameterType="Control" parameterSource="P_COUNTRY_ID"/>
<CustomParameter id="136" field="PAYMENT_PRIORITY" dataType="Float" parameterType="Control" parameterSource="PAYMENT_PRIORITY"/>
<CustomParameter id="137" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="138" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="139" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="140" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="141" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="156" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_company.php" forShow="True" url="p_company.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_company_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="125"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="126"/>
</Actions>
</Event>
</Events>
</Page>
