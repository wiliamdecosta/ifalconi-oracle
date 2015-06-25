<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.* ,
b.code as p_switch_coordinate_name,
c.code as p_service_type_name,
d.code as p_city_coordinate_name,
e.code as p_coverage_area_name,
f.code as p_access_code_name,
g.code as p_trunk_name,
h.code as p_company_name,
i.code as p_organization_name
from p_poc a,
p_switch_coordinate b,
p_service_type c,
p_city_coordinate d,
p_coverage_area e,
p_access_code f,
p_trunk g,
p_company h,
p_organization i
where
a.p_switch_coordinate_id=b.p_switch_coordinate_id(+)
and a.p_service_type_id=c.p_service_type_id(+)
and a.p_city_coordinate_id=d.p_city_coordinate_id(+)
and a.p_coverage_area_id=e.p_coverage_area_id(+)
and a.p_access_code_id=f.p_access_code_id(+)
and a.p_trunk_id=g.p_trunk_id(+)
and a.p_company_id=h.p_company_id(+)
and a.p_organization_id=i.p_organization_id(+)
and upper(a.code) like upper('%{s_keyword}%')" name="P_POC" orderBy="P_POC_ID" pageSizeLimit="100" wizardCaption=" P POC " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="14" wizardMaxLength="14" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_POCCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_POCP_SERVICE_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COVERAGE_AREA_NAME" fieldSource="P_COVERAGE_AREA_NAME" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_POCP_COVERAGE_AREA_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_ACCESS_CODE_NAME" fieldSource="P_ACCESS_CODE_NAME" wizardCaption="P ACCESS CODE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_POCP_ACCESS_CODE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COMPANY_NAME" fieldSource="P_COMPANY_NAME" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_POCP_COMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_ORGANIZATION_NAME" fieldSource="P_ORGANIZATION_NAME" wizardCaption="P ORGANIZATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_POCP_ORGANIZATION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="42" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_POC_Insert" hrefSource="p_poc.ccp" removeParameters="P_POC_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_POCP_POC_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="71"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="72" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_POCDLink" hrefSource="p_poc.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_POC_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="46" sourceType="DataField" name="P_POC_ID" source="P_POC_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="47" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_POCADLink" hrefSource="p_poc.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_POC_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="48" sourceType="DataField" format="yyyy-mm-dd" name="P_POC_ID" source="P_POC_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_POC_ID" fieldSource="P_POC_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_poc.ccp" wizardThemeItem="GridA" PathID="P_POCP_POC_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="21" sourceType="DataField" format="yyyy-mm-dd" name="P_POC_ID" source="P_POC_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="73" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="74"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="148" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_POCSearch" wizardCaption=" P POC " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_poc.ccp" PathID="P_POCSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="14" wizardMaxLength="14" wizardIsPassword="False" PathID="P_POCSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_POCSearchButton_DoSearch">
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
		<Record id="43" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_poc1" dataSource="select a.* ,
b.code as p_switch_coordinate_name,
c.code as p_service_type_name,
d.code as p_city_coordinate_name,
e.code as p_coverage_area_name,
f.code as p_access_code_name,
g.code as p_trunk_name,
h.code as p_company_name,
i.code as p_organization_name
from p_poc a,
p_switch_coordinate b,
p_service_type c,
p_city_coordinate d,
p_coverage_area e,
p_access_code f,
p_trunk g,
p_company h,
p_organization i
where
a.p_switch_coordinate_id=b.p_switch_coordinate_id(+)
and a.p_service_type_id=c.p_service_type_id(+)
and a.p_city_coordinate_id=d.p_city_coordinate_id(+)
and a.p_coverage_area_id=e.p_coverage_area_id(+)
and a.p_access_code_id=f.p_access_code_id(+)
and a.p_trunk_id=g.p_trunk_id(+)
and a.p_company_id=h.p_company_id(+)
and a.p_organization_id=i.p_organization_id(+)
and a.P_POC_ID={P_POC_ID}" errorSummator="Error" wizardCaption=" P Poc " wizardFormMethod="post" PathID="p_poc1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_POC(P_POC_ID, CODE, P_SWITCH_COORDINATE_ID, P_SERVICE_TYPE_ID, P_CITY_COORDINATE_ID, P_COVERAGE_AREA_ID, P_ACCESS_CODE_ID, P_TRUNK_ID, P_COMPANY_ID, P_ORGANIZATION_ID, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) 
VALUES
(GENERATE_ID('TRB','P_POC','P_POC_ID'), '{CODE}',{P_SWITCH_COORDINATE_ID},{P_SERVICE_TYPE_ID},{P_CITY_COORDINATE_ID},{P_COVERAGE_AREA_ID},{P_ACCESS_CODE_ID},{P_TRUNK_ID},{P_COMPANY_ID},{P_ORGANIZATION_ID},'{DESCRIPTION}',sysdate,'{CREATED_BY}',sysdate,'{UPDATED_BY}') " customDeleteType="SQL" customDelete="DELETE FROM P_POC WHERE P_POC_ID = {P_POC_ID}" customUpdateType="SQL" customUpdate="UPDATE P_POC SET 
CODE='{CODE}',
P_SWITCH_COORDINATE_ID={P_SWITCH_COORDINATE_ID}, 
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID}, 
P_CITY_COORDINATE_ID={P_CITY_COORDINATE_ID}, 
P_COVERAGE_AREA_ID={P_COVERAGE_AREA_ID}, 
P_ACCESS_CODE_ID={P_ACCESS_CODE_ID}, 
P_TRUNK_ID={P_TRUNK_ID}, 
P_COMPANY_ID={P_COMPANY_ID}, 
P_ORGANIZATION_ID={P_ORGANIZATION_ID},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_POC_ID = {P_POC_ID}"><Components><TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="14" wizardMaxLength="14" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SWITCH_COORDINATE_ID" fieldSource="P_SWITCH_COORDINATE_ID" required="False" caption="P_SWITCH_COORDINATE_ID" wizardCaption="P SWITCH COORDINATE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_SWITCH_COORDINATE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="False" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_SERVICE_TYPE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CITY_COORDINATE_ID" fieldSource="P_CITY_COORDINATE_ID" required="False" caption="P CITY COORDINATE ID" wizardCaption="P CITY COORDINATE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_CITY_COORDINATE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COVERAGE_AREA_ID" fieldSource="P_COVERAGE_AREA_ID" required="False" caption="P COVERAGE AREA ID" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_COVERAGE_AREA_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ACCESS_CODE_ID" fieldSource="P_ACCESS_CODE_ID" required="False" caption="P ACCESS CODE ID" wizardCaption="P ACCESS CODE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_ACCESS_CODE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_TRUNK_ID" fieldSource="P_TRUNK_ID" required="False" caption="P TRUNK ID" wizardCaption="P TRUNK ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_TRUNK_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COMPANY_ID" fieldSource="P_COMPANY_ID" required="False" caption="P COMPANY ID" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_COMPANY_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ORGANIZATION_ID" fieldSource="P_ORGANIZATION_ID" required="False" caption="P ORGANIZATION ID" wizardCaption="P ORGANIZATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_ORGANIZATION_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextArea id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="62" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="66" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_poc1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="67" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_poc1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="68" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_poc1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="69"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="70" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_poc1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="103" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SWITCH_COORDINATE_NAME" fieldSource="P_SWITCH_COORDINATE_NAME" required="False" caption="P_SWITCH_COORDINATE_NAME" wizardCaption="P SWITCH COORDINATE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_SWITCH_COORDINATE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" required="False" caption="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_SERVICE_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CITY_COORDINATE_NAME" fieldSource="P_CITY_COORDINATE_NAME" required="False" caption="P_CITY_COORDINATE_NAME" wizardCaption="P CITY COORDINATE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_CITY_COORDINATE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COVERAGE_AREA_NAME" fieldSource="P_COVERAGE_AREA_NAME" required="False" caption="P COVERAGE AREA ID" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_COVERAGE_AREA_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_ACCESS_CODE_NAME" fieldSource="P_ACCESS_CODE_NAME" required="False" caption="P_ACCESS_CODE_NAME" wizardCaption="P ACCESS CODE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_ACCESS_CODE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="108" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_TRUNK_NAME" fieldSource="P_TRUNK_NAME" required="False" caption="P_TRUNK_NAME" wizardCaption="P TRUNK ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_TRUNK_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="109" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COMPANY_NAME" fieldSource="P_COMPANY_NAME" required="False" caption="P_COMPANY_NAME" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_COMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="110" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_ORGANIZATION_NAME" fieldSource="P_ORGANIZATION_NAME" required="False" caption="P_ORGANIZATION_NAME" wizardCaption="P ORGANIZATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_ORGANIZATION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="112" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_POC_ID" fieldSource="P_POC_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="14" wizardMaxLength="14" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_poc1P_POC_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="49" conditionType="Parameter" useIsNull="False" field="P_POC_ID" parameterSource="P_POC_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="149" parameterType="URL" variable="P_POC_ID" dataType="Float" parameterSource="P_POC_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="91" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="92" variable="P_SWITCH_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SWITCH_COORDINATE_ID"/>
				<SQLParameter id="93" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="94" variable="P_CITY_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CITY_COORDINATE_ID"/>
				<SQLParameter id="95" variable="P_COVERAGE_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COVERAGE_AREA_ID"/>
				<SQLParameter id="96" variable="P_ACCESS_CODE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ACCESS_CODE_ID"/>
				<SQLParameter id="97" variable="P_TRUNK_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TRUNK_ID"/>
				<SQLParameter id="98" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
				<SQLParameter id="99" variable="P_ORGANIZATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ORGANIZATION_ID"/>
				<SQLParameter id="100" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="101" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="102" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="77" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="78" field="P_SWITCH_COORDINATE_ID" dataType="Float" parameterType="Control" parameterSource="P_SWITCH_COORDINATE_ID"/>
				<CustomParameter id="79" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="80" field="P_CITY_COORDINATE_ID" dataType="Float" parameterType="Control" parameterSource="P_CITY_COORDINATE_ID"/>
				<CustomParameter id="81" field="P_COVERAGE_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_COVERAGE_AREA_ID"/>
				<CustomParameter id="82" field="P_ACCESS_CODE_ID" dataType="Float" parameterType="Control" parameterSource="P_ACCESS_CODE_ID"/>
				<CustomParameter id="83" field="P_TRUNK_ID" dataType="Float" parameterType="Control" parameterSource="P_TRUNK_ID"/>
				<CustomParameter id="84" field="P_COMPANY_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_ID"/>
				<CustomParameter id="85" field="P_ORGANIZATION_ID" dataType="Float" parameterType="Control" parameterSource="P_ORGANIZATION_ID"/>
				<CustomParameter id="86" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="87" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="88" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="89" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="90" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="136" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="137" variable="P_SWITCH_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SWITCH_COORDINATE_ID"/>
<SQLParameter id="138" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="139" variable="P_CITY_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CITY_COORDINATE_ID"/>
<SQLParameter id="140" variable="P_COVERAGE_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COVERAGE_AREA_ID"/>
<SQLParameter id="141" variable="P_ACCESS_CODE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ACCESS_CODE_ID"/>
<SQLParameter id="142" variable="P_TRUNK_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TRUNK_ID"/>
<SQLParameter id="143" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
<SQLParameter id="144" variable="P_ORGANIZATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ORGANIZATION_ID"/>
<SQLParameter id="145" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="146" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="147" variable="P_POC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_POC_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="113" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="114" field="P_SWITCH_COORDINATE_ID" dataType="Float" parameterType="Control" parameterSource="P_SWITCH_COORDINATE_ID"/>
<CustomParameter id="115" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="116" field="P_CITY_COORDINATE_ID" dataType="Float" parameterType="Control" parameterSource="P_CITY_COORDINATE_ID"/>
<CustomParameter id="117" field="P_COVERAGE_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_COVERAGE_AREA_ID"/>
<CustomParameter id="118" field="P_ACCESS_CODE_ID" dataType="Float" parameterType="Control" parameterSource="P_ACCESS_CODE_ID"/>
<CustomParameter id="119" field="P_TRUNK_ID" dataType="Float" parameterType="Control" parameterSource="P_TRUNK_ID"/>
<CustomParameter id="120" field="P_COMPANY_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_ID"/>
<CustomParameter id="121" field="P_ORGANIZATION_ID" dataType="Float" parameterType="Control" parameterSource="P_ORGANIZATION_ID"/>
<CustomParameter id="122" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="123" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="124" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="125" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="126" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="127" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_SWITCH_COORDINATE_NAME"/>
<CustomParameter id="128" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
<CustomParameter id="129" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_CITY_COORDINATE_NAME"/>
<CustomParameter id="130" field="P_COVERAGE_AREA_ID" dataType="Text" parameterType="Control" parameterSource="P_COVERAGE_AREA_NAME"/>
<CustomParameter id="131" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_ACCESS_CODE_NAME"/>
<CustomParameter id="132" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_TRUNK_NAME"/>
<CustomParameter id="133" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_COMPANY_NAME"/>
<CustomParameter id="134" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_ORGANIZATION_NAME"/>
<CustomParameter id="135" field="P_POC_ID" dataType="Float" parameterType="Control" parameterSource="P_POC_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="111" variable="P_POC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_POC_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_poc.php" forShow="True" url="p_poc.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_poc_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="75"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="76"/>
			</Actions>
		</Event>
	</Events>
</Page>
