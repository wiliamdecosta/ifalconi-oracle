<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as p_company_name,c.region_name as p_region_name,d.code as p_country_name 
from p_organization a,
p_company b,
p_region c,
p_country d
where a.p_company_id=b.p_company_id
and a.p_region_id=c.p_region_id
and a.p_country_id=d.p_country_id
and upper(a.code) like upper('%{s_keyword}%')" name="P_ORGANIZATION" orderBy="P_ORGANIZATION_ID" pageSizeLimit="100" wizardCaption=" P ORGANIZATION " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="36" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ORGANIZATIONCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Text" html="False" name="ORGANIZATION_NAME" fieldSource="ORGANIZATION_NAME" wizardCaption="ORGANIZATION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ORGANIZATIONORGANIZATION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COMPANY_NAME" fieldSource="P_COMPANY_NAME" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ORGANIZATIONP_COMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Float" html="False" name="LEVEL_NUMBER" fieldSource="LEVEL_NUMBER" wizardCaption="LEVEL NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ORGANIZATIONLEVEL_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_BILLING_CENTER_ID" fieldSource="P_BILLING_CENTER_ID" wizardCaption="P BILLING CENTER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ORGANIZATIONP_BILLING_CENTER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" name="FINANCE_CODE" fieldSource="FINANCE_CODE" wizardCaption="FINANCE CODE" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ORGANIZATIONFINANCE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_REGION_NAME" fieldSource="P_REGION_NAME" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ORGANIZATIONP_REGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="71" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ORGANIZATION_Insert" hrefSource="p_organization.ccp" removeParameters="P_ORGANIZATION_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_ORGANIZATIONP_ORGANIZATION_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="104"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="105" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="106" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_ORGANIZATIONDLink" hrefSource="p_organization.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_ORGANIZATION_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="107" sourceType="DataField" name="P_ORGANIZATION_ID" source="P_ORGANIZATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="108" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_ORGANIZATIONADLink" hrefSource="p_organization.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_ORGANIZATION_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="48" sourceType="DataField" format="yyyy-mm-dd" name="P_ORGANIZATION_ID" source="P_ORGANIZATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ORGANIZATION_ID" fieldSource="P_ORGANIZATION_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_organization.ccp" wizardThemeItem="GridA" PathID="P_ORGANIZATIONP_ORGANIZATION_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="34" sourceType="DataField" format="yyyy-mm-dd" name="P_ORGANIZATION_ID" source="P_ORGANIZATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="109" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="110"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="ORGANIZATION_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="ADDRESS_1" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="11" conditionType="Parameter" useIsNull="False" field="ADDRESS_2" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
				<TableParameter id="12" conditionType="Parameter" useIsNull="False" field="ADDRESS_3" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="5"/>
				<TableParameter id="13" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="6" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="192" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_ORGANIZATIONSearch" wizardCaption=" P ORGANIZATION " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_organization.ccp" PathID="P_ORGANIZATIONSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_ORGANIZATIONSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_ORGANIZATIONSearchButton_DoSearch">
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
		<Record id="72" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_organization1" dataSource="select a.*,b.code as p_company_name,c.region_name as p_region_name,d.code as p_country_name 
from p_organization a,
p_company b,
p_region c,
p_country d
where a.p_company_id=b.p_company_id
and a.p_region_id=c.p_region_id
and a.p_country_id=d.p_country_id
and a.P_ORGANIZATION_ID={P_ORGANIZATION_ID}" errorSummator="Error" wizardCaption=" P Organization " wizardFormMethod="post" PathID="p_organization1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_ORGANIZATION(P_ORGANIZATION_ID, CODE, ORGANIZATION_NAME, P_COMPANY_ID, LEVEL_NUMBER, P_BILLING_CENTER_ID, FINANCE_CODE, PARENT_ID, ADDRESS_1, ADDRESS_2, ADDRESS_3, P_REGION_ID, ZIP_CODE, P_COUNTRY_ID, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) 
VALUES
(GENERATE_ID('TRB','P_ORGANIZATION','P_ORGANIZATION_ID'),'{CODE}','{ORGANIZATION_NAME}',{P_COMPANY_ID},{LEVEL_NUMBER},{P_BILLING_CENTER_ID},'{FINANCE_CODE}',{PARENT_ID},'{ADDRESS_1}','{ADDRESS_2}','{ADDRESS_3}',{P_REGION_ID},{ZIP_CODE},{P_COUNTRY_ID},'{DESCRIPTION}', sysdate, '{CREATED_BY}', sysdate, '{UPDATED_BY}') " customUpdateType="SQL" customUpdate="UPDATE P_ORGANIZATION SET 
CODE='{CODE}',
ORGANIZATION_NAME='{ORGANIZATION_NAME}',
P_COMPANY_ID={P_COMPANY_ID},
LEVEL_NUMBER={LEVEL_NUMBER},
P_BILLING_CENTER_ID={P_BILLING_CENTER_ID},
FINANCE_CODE='{FINANCE_CODE}',
PARENT_ID={PARENT_ID},
ADDRESS_1='{ADDRESS_1}',
ADDRESS_2='{ADDRESS_2}',
ADDRESS_3='{ADDRESS_3}',
P_REGION_ID={P_REGION_ID},
ZIP_CODE={ZIP_CODE},
P_COUNTRY_ID={P_COUNTRY_ID},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_ORGANIZATION_ID = {P_ORGANIZATION_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_ORGANIZATION WHERE P_ORGANIZATION_ID = {P_ORGANIZATION_ID}">
			<Components>
				<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ORGANIZATION_NAME" fieldSource="ORGANIZATION_NAME" required="True" caption="ORGANIZATION NAME" wizardCaption="ORGANIZATION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1ORGANIZATION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COMPANY_ID" fieldSource="P_COMPANY_ID" required="True" caption="P COMPANY ID" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1P_COMPANY_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LEVEL_NUMBER" fieldSource="LEVEL_NUMBER" required="True" caption="LEVEL NUMBER" wizardCaption="LEVEL NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1LEVEL_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FINANCE_CODE" fieldSource="FINANCE_CODE" required="False" caption="FINANCE CODE" wizardCaption="FINANCE CODE" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1FINANCE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PARENT_ID" fieldSource="PARENT_ID" required="False" caption="PARENT ID" wizardCaption="PARENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1PARENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_1" fieldSource="ADDRESS_1" required="False" caption="ADDRESS 1" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1ADDRESS_1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_2" fieldSource="ADDRESS_2" required="False" caption="ADDRESS 2" wizardCaption="ADDRESS 2" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1ADDRESS_2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_3" fieldSource="ADDRESS_3" required="False" caption="ADDRESS 3" wizardCaption="ADDRESS 3" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1ADDRESS_3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="89" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_ID" fieldSource="P_REGION_ID" required="False" caption="P REGION ID" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1P_REGION_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="90" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ZIP_CODE" fieldSource="ZIP_CODE" required="False" caption="ZIP CODE" wizardCaption="ZIP CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1ZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COUNTRY_ID" fieldSource="P_COUNTRY_ID" required="False" caption="P COUNTRY ID" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1P_COUNTRY_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextArea id="92" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="95" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="93" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="96" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="99" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert1" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_organization1Button_Insert1" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="100" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update1" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_organization1Button_Update1" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="101" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete1" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_organization1Button_Delete1" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="102"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="103" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel1" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_organization1Button_Cancel1" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="148" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COMPANY_NAME" fieldSource="P_COMPANY_NAME" required="False" caption="P_COMPANY_NAME" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1P_COMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="150" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_REGION_NAME" fieldSource="P_REGION_NAME" required="False" caption="P_REGION_NAME" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1P_REGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="151" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COUNTRY_NAME" fieldSource="P_COUNTRY_NAME" required="False" caption="P_COUNTRY_NAME" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_organization1P_COUNTRY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<Hidden id="189" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ORGANIZATION_ID" caption="CODE" fieldSource="P_ORGANIZATION_ID" required="False" PathID="p_organization1P_ORGANIZATION_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="149" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_CENTER_ID" caption="P BILLING CENTER ID" fieldSource="P_BILLING_CENTER_ID" required="False" PathID="p_organization1P_BILLING_CENTER_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="78" conditionType="Parameter" useIsNull="False" field="P_ORGANIZATION_ID" parameterSource="P_ORGANIZATION_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="193" parameterType="URL" variable="P_ORGANIZATION_ID" dataType="Float" parameterSource="P_ORGANIZATION_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="132" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="133" variable="ORGANIZATION_NAME" parameterType="Control" dataType="Text" parameterSource="ORGANIZATION_NAME"/>
<SQLParameter id="134" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
<SQLParameter id="135" variable="LEVEL_NUMBER" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LEVEL_NUMBER"/>
<SQLParameter id="136" variable="P_BILLING_CENTER_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_CENTER_ID"/>
<SQLParameter id="137" variable="FINANCE_CODE" parameterType="Control" dataType="Text" parameterSource="FINANCE_CODE"/>
<SQLParameter id="138" variable="PARENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PARENT_ID"/>
<SQLParameter id="139" variable="ADDRESS_1" parameterType="Control" dataType="Text" parameterSource="ADDRESS_1"/>
<SQLParameter id="140" variable="ADDRESS_2" parameterType="Control" dataType="Text" parameterSource="ADDRESS_2"/>
<SQLParameter id="141" variable="ADDRESS_3" parameterType="Control" dataType="Text" parameterSource="ADDRESS_3"/>
<SQLParameter id="142" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
<SQLParameter id="143" variable="ZIP_CODE" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ZIP_CODE"/>
<SQLParameter id="144" variable="P_COUNTRY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COUNTRY_ID"/>
<SQLParameter id="145" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="146" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="147" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
			<IFormElements>
<CustomParameter id="114" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="115" field="ORGANIZATION_NAME" dataType="Text" parameterType="Control" parameterSource="ORGANIZATION_NAME"/>
<CustomParameter id="116" field="P_COMPANY_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_ID"/>
<CustomParameter id="117" field="LEVEL_NUMBER" dataType="Float" parameterType="Control" parameterSource="LEVEL_NUMBER"/>
<CustomParameter id="118" field="P_BILLING_CENTER_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_CENTER_ID"/>
<CustomParameter id="119" field="FINANCE_CODE" dataType="Text" parameterType="Control" parameterSource="FINANCE_CODE"/>
<CustomParameter id="120" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
<CustomParameter id="121" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
<CustomParameter id="122" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
<CustomParameter id="123" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
<CustomParameter id="124" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
<CustomParameter id="125" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
<CustomParameter id="126" field="P_COUNTRY_ID" dataType="Float" parameterType="Control" parameterSource="P_COUNTRY_ID"/>
<CustomParameter id="127" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="128" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="129" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="130" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="131" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="174" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="175" variable="ORGANIZATION_NAME" parameterType="Control" dataType="Text" parameterSource="ORGANIZATION_NAME"/>
<SQLParameter id="176" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
<SQLParameter id="177" variable="LEVEL_NUMBER" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LEVEL_NUMBER"/>
<SQLParameter id="178" variable="P_BILLING_CENTER_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_CENTER_ID"/>
<SQLParameter id="179" variable="FINANCE_CODE" parameterType="Control" dataType="Text" parameterSource="FINANCE_CODE"/>
<SQLParameter id="180" variable="PARENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PARENT_ID"/>
<SQLParameter id="181" variable="ADDRESS_1" parameterType="Control" dataType="Text" parameterSource="ADDRESS_1"/>
<SQLParameter id="182" variable="ADDRESS_2" parameterType="Control" dataType="Text" parameterSource="ADDRESS_2"/>
<SQLParameter id="183" variable="ADDRESS_3" parameterType="Control" dataType="Text" parameterSource="ADDRESS_3"/>
<SQLParameter id="184" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
<SQLParameter id="185" variable="ZIP_CODE" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ZIP_CODE"/>
<SQLParameter id="186" variable="P_COUNTRY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COUNTRY_ID"/>
<SQLParameter id="187" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="188" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="190" variable="P_ORGANIZATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ORGANIZATION_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="152" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="153" field="ORGANIZATION_NAME" dataType="Text" parameterType="Control" parameterSource="ORGANIZATION_NAME"/>
<CustomParameter id="154" field="P_COMPANY_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_ID"/>
<CustomParameter id="155" field="LEVEL_NUMBER" dataType="Float" parameterType="Control" parameterSource="LEVEL_NUMBER"/>
<CustomParameter id="156" field="P_BILLING_CENTER_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_CENTER_ID"/>
<CustomParameter id="157" field="FINANCE_CODE" dataType="Text" parameterType="Control" parameterSource="FINANCE_CODE"/>
<CustomParameter id="158" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
<CustomParameter id="159" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
<CustomParameter id="160" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
<CustomParameter id="161" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
<CustomParameter id="162" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
<CustomParameter id="163" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
<CustomParameter id="164" field="P_COUNTRY_ID" dataType="Float" parameterType="Control" parameterSource="P_COUNTRY_ID"/>
<CustomParameter id="165" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="166" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="167" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="168" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="169" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="170" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="P_COMPANY_NAME"/>
<CustomParameter id="171" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="P_BILLING_CENTER_NAME"/>
<CustomParameter id="172" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_REGION_NAME"/>
<CustomParameter id="173" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_COUNTRY_NAME"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="191" variable="P_ORGANIZATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ORGANIZATION_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_organization.php" forShow="True" url="p_organization.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_organization_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="111"/>
<Action actionName="Custom Code" actionCategory="General" id="112"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="113"/>
</Actions>
</Event>
</Events>
</Page>
