<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as P_COMPANY_NAME,c.code as P_ORGANIZATION_NAME,
d.code as P_CITY_COORDINATE_NAME, e.code as P_COVERAGE_AREA_NAME
 from p_trunk a,
P_COMPANY b,
P_ORGANIZATION c,
P_CITY_COORDINATE d,
P_COVERAGE_AREA e
where
a.P_COMPANY_ID=b.P_COMPANY_ID(+)
and a.P_ORGANIZATION_ID=c.P_ORGANIZATION_ID(+)
and a.P_CITY_COORDINATE_ID=d.P_CITY_COORDINATE_ID(+)
and a.P_COVERAGE_AREA_ID=e.P_COVERAGE_AREA_ID(+)
and upper(a.code) like upper('%{s_keyword}%')" name="P_TRUNK" orderBy="P_TRUNK_ID" pageSizeLimit="100" wizardCaption=" P TRUNK " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_TRUNKCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COMPANY_NAME" fieldSource="P_COMPANY_NAME" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_TRUNKP_COMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="36" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_ORGANIZATION_NAME" fieldSource="P_ORGANIZATION_NAME" wizardCaption="P ORGANIZATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_TRUNKP_ORGANIZATION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COVERAGE_AREA_NAME" fieldSource="P_COVERAGE_AREA_NAME" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_TRUNKP_COVERAGE_AREA_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Text" html="False" name="OPC" fieldSource="OPC" wizardCaption="OPC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_TRUNKOPC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" name="DPC" fieldSource="DPC" wizardCaption="DPC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_TRUNKDPC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="58" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_TRUNKDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="67" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_TRUNK_Insert" hrefSource="p_trunk.ccp" removeParameters="P_TRUNK_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_TRUNKP_TRUNK_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="100"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="101" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="141" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_TRUNKDLink" hrefSource="p_trunk.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_TRUNK_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="142" sourceType="DataField" name="P_TRUNK_ID" source="P_TRUNK_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="143" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_TRUNKADLink" hrefSource="p_trunk.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_TRUNK_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="144" sourceType="DataField" format="yyyy-mm-dd" name="P_TRUNK_ID" source="P_TRUNK_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_TRUNK_ID" fieldSource="P_TRUNK_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_trunk.ccp" wizardThemeItem="GridA" PathID="P_TRUNKP_TRUNK_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="30" sourceType="DataField" format="yyyy-mm-dd" name="P_TRUNK_ID" source="P_TRUNK_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="102" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="103"/>
						<Action actionName="Custom Code" actionCategory="General" id="104"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="188" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_TRUNKSearch" wizardCaption=" P TRUNK " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_trunk.ccp" PathID="P_TRUNKSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_TRUNKSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_TRUNKSearchButton_DoSearch">
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
		<Record id="68" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_trunk1" dataSource="select a.*,b.code as P_COMPANY_NAME,c.code as P_ORGANIZATION_NAME,
d.code as P_CITY_COORDINATE_NAME, e.code as P_COVERAGE_AREA_NAME
 from p_trunk a,
P_COMPANY b,
P_ORGANIZATION c,
P_CITY_COORDINATE d,
P_COVERAGE_AREA e
where
a.P_COMPANY_ID=b.P_COMPANY_ID(+)
and a.P_ORGANIZATION_ID=c.P_ORGANIZATION_ID(+)
and a.P_CITY_COORDINATE_ID=d.P_CITY_COORDINATE_ID(+)
and a.P_COVERAGE_AREA_ID=e.P_COVERAGE_AREA_ID(+)
and a.P_TRUNK_ID={P_TRUNK_ID}" errorSummator="Error" wizardCaption=" P Trunk " wizardFormMethod="post" PathID="p_trunk1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_TRUNK(P_TRUNK_ID, CODE, P_COMPANY_ID, P_ORGANIZATION_ID, P_CITY_COORDINATE_ID, P_COVERAGE_AREA_ID, OPC, DPC, EM_DEG, EM_MIN, EM_SEC, SL_DEG, SL_MIN, SL_SEC, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) 
VALUES
(GENERATE_ID('TRB','P_TRUNK','P_TRUNK_ID'), '{CODE}',{P_COMPANY_ID},{P_ORGANIZATION_ID},{P_CITY_COORDINATE_ID},{P_COVERAGE_AREA_ID},'{OPC}','{DPC}',{EM_DEG},{EM_MIN},{EM_SEC},{SL_DEG},{SL_MIN},{SL_SEC},'{DESCRIPTION}',sysdate,'{CREATED_BY}',sysdate,'{UPDATED_BY}') " parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customUpdateType="SQL" customUpdate="UPDATE P_TRUNK SET 
CODE='{CODE}',
P_COMPANY_ID={P_COMPANY_ID},
P_ORGANIZATION_ID={P_ORGANIZATION_ID},
P_CITY_COORDINATE_ID={P_CITY_COORDINATE_ID},
P_COVERAGE_AREA_ID={P_COVERAGE_AREA_ID},
OPC='{OPC}',
DPC='{DPC}',
EM_DEG={EM_DEG},
EM_MIN={EM_MIN},
EM_SEC={EM_SEC},
SL_DEG={SL_DEG},
SL_MIN={SL_MIN},
SL_SEC={SL_SEC},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_TRUNK_ID = {P_TRUNK_ID}">
			<Components>
				<TextBox id="75" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COMPANY_ID" fieldSource="P_COMPANY_ID" required="True" caption="P COMPANY ID" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_COMPANY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="77" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ORGANIZATION_ID" fieldSource="P_ORGANIZATION_ID" required="False" caption="P ORGANIZATION ID" wizardCaption="P ORGANIZATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_ORGANIZATION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="78" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CITY_COORDINATE_ID" fieldSource="P_CITY_COORDINATE_ID" required="False" caption="P CITY COORDINATE ID" wizardCaption="P CITY COORDINATE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_CITY_COORDINATE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COVERAGE_AREA_ID" fieldSource="P_COVERAGE_AREA_ID" required="False" caption="P COVERAGE AREA ID" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_COVERAGE_AREA_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OPC" fieldSource="OPC" required="False" caption="OPC" wizardCaption="OPC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1OPC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DPC" fieldSource="DPC" required="False" caption="DPC" wizardCaption="DPC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1DPC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_DEG" fieldSource="EM_DEG" required="False" caption="EM DEG" wizardCaption="EM DEG" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1EM_DEG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_DEG" fieldSource="SL_DEG" required="False" caption="SL DEG" wizardCaption="SL DEG" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1SL_DEG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="89" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="92" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="95" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_trunk1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="96" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_trunk1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="97" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_trunk1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="98"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="99" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_trunk1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_MIN" fieldSource="EM_MIN" required="False" caption="EM MIN" wizardCaption="EM MIN" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1EM_MIN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_SEC" fieldSource="EM_SEC" required="False" caption="EM SEC" wizardCaption="EM SEC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1EM_SEC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_MIN" fieldSource="SL_MIN" required="False" caption="SL MIN" wizardCaption="SL MIN" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1SL_MIN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_SEC" fieldSource="SL_SEC" required="False" caption="SL SEC" wizardCaption="SL SEC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1SL_SEC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="145" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COMPANY_NAME" fieldSource="P_COMPANY_NAME" required="True" caption="P COMPANY NAME" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_COMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="146" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_ORGANIZATION_NAME" fieldSource="P_ORGANIZATION_NAME" required="False" caption="P_ORGANIZATION_NAME" wizardCaption="P ORGANIZATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_ORGANIZATION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="147" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CITY_COORDINATE_NAME" fieldSource="P_CITY_COORDINATE_NAME" required="False" caption="P_CITY_COORDINATE_NAME" wizardCaption="P CITY COORDINATE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_CITY_COORDINATE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="148" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COVERAGE_AREA_NAME" fieldSource="P_COVERAGE_AREA_NAME" required="False" caption="P_COVERAGE_AREA_NAME" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_COVERAGE_AREA_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="186" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_TRUNK_ID" fieldSource="P_TRUNK_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_trunk1P_TRUNK_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="74" conditionType="Parameter" useIsNull="False" field="P_TRUNK_ID" parameterSource="P_TRUNK_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="189" parameterType="URL" variable="P_TRUNK_ID" dataType="Float" parameterSource="P_TRUNK_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="125" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="126" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
				<SQLParameter id="127" variable="P_ORGANIZATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ORGANIZATION_ID"/>
				<SQLParameter id="128" variable="P_CITY_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CITY_COORDINATE_ID"/>
				<SQLParameter id="129" variable="P_COVERAGE_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COVERAGE_AREA_ID"/>
				<SQLParameter id="130" variable="OPC" parameterType="Control" dataType="Text" parameterSource="OPC"/>
				<SQLParameter id="131" variable="DPC" parameterType="Control" dataType="Text" parameterSource="DPC"/>
				<SQLParameter id="132" variable="EM_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_DEG"/>
				<SQLParameter id="133" variable="EM_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_MIN"/>
				<SQLParameter id="134" variable="EM_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_SEC"/>
				<SQLParameter id="135" variable="SL_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_DEG"/>
				<SQLParameter id="136" variable="SL_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_MIN"/>
				<SQLParameter id="137" variable="SL_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_SEC"/>
				<SQLParameter id="138" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="139" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="140" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="107" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="108" field="P_COMPANY_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_ID"/>
				<CustomParameter id="109" field="P_ORGANIZATION_ID" dataType="Float" parameterType="Control" parameterSource="P_ORGANIZATION_ID"/>
				<CustomParameter id="110" field="P_CITY_COORDINATE_ID" dataType="Float" parameterType="Control" parameterSource="P_CITY_COORDINATE_ID"/>
				<CustomParameter id="111" field="P_COVERAGE_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_COVERAGE_AREA_ID"/>
				<CustomParameter id="112" field="OPC" dataType="Text" parameterType="Control" parameterSource="OPC"/>
				<CustomParameter id="113" field="DPC" dataType="Text" parameterType="Control" parameterSource="DPC"/>
				<CustomParameter id="114" field="EM_DEG" dataType="Float" parameterType="Control" parameterSource="EM_DEG"/>
				<CustomParameter id="115" field="EM_MIN" dataType="Float" parameterType="Control" parameterSource="EM_MIN"/>
				<CustomParameter id="116" field="EM_SEC" dataType="Float" parameterType="Control" parameterSource="EM_SEC"/>
				<CustomParameter id="117" field="SL_DEG" dataType="Float" parameterType="Control" parameterSource="SL_DEG"/>
				<CustomParameter id="118" field="SL_MIN" dataType="Float" parameterType="Control" parameterSource="SL_MIN"/>
				<CustomParameter id="119" field="SL_SEC" dataType="Float" parameterType="Control" parameterSource="SL_SEC"/>
				<CustomParameter id="120" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="121" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="122" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="123" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="124" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="171" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="172" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
<SQLParameter id="173" variable="P_ORGANIZATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ORGANIZATION_ID"/>
<SQLParameter id="174" variable="P_CITY_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CITY_COORDINATE_ID"/>
<SQLParameter id="175" variable="P_COVERAGE_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COVERAGE_AREA_ID"/>
<SQLParameter id="176" variable="OPC" parameterType="Control" dataType="Text" parameterSource="OPC"/>
<SQLParameter id="177" variable="DPC" parameterType="Control" dataType="Text" parameterSource="DPC"/>
<SQLParameter id="178" variable="EM_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_DEG"/>
<SQLParameter id="179" variable="EM_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_MIN"/>
<SQLParameter id="180" variable="EM_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_SEC"/>
<SQLParameter id="181" variable="SL_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_DEG"/>
<SQLParameter id="182" variable="SL_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_MIN"/>
<SQLParameter id="183" variable="SL_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_SEC"/>
<SQLParameter id="184" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="185" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="187" variable="P_TRUNK_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TRUNK_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="149" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="150" field="P_COMPANY_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_ID"/>
<CustomParameter id="151" field="P_ORGANIZATION_ID" dataType="Float" parameterType="Control" parameterSource="P_ORGANIZATION_ID"/>
<CustomParameter id="152" field="P_CITY_COORDINATE_ID" dataType="Float" parameterType="Control" parameterSource="P_CITY_COORDINATE_ID"/>
<CustomParameter id="153" field="P_COVERAGE_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_COVERAGE_AREA_ID"/>
<CustomParameter id="154" field="OPC" dataType="Text" parameterType="Control" parameterSource="OPC"/>
<CustomParameter id="155" field="DPC" dataType="Text" parameterType="Control" parameterSource="DPC"/>
<CustomParameter id="156" field="EM_DEG" dataType="Float" parameterType="Control" parameterSource="EM_DEG"/>
<CustomParameter id="157" field="SL_DEG" dataType="Float" parameterType="Control" parameterSource="SL_DEG"/>
<CustomParameter id="158" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="159" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="160" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="161" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="162" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="163" field="EM_MIN" dataType="Float" parameterType="Control" parameterSource="EM_MIN"/>
<CustomParameter id="164" field="EM_SEC" dataType="Float" parameterType="Control" parameterSource="EM_SEC"/>
<CustomParameter id="165" field="SL_MIN" dataType="Float" parameterType="Control" parameterSource="SL_MIN"/>
<CustomParameter id="166" field="SL_SEC" dataType="Float" parameterType="Control" parameterSource="SL_SEC"/>
<CustomParameter id="167" field="OPC" dataType="Text" parameterType="Control" parameterSource="P_COMPANY_NAME"/>
<CustomParameter id="168" field="OPC" dataType="Text" parameterType="Control" parameterSource="P_ORGANIZATION_NAME"/>
<CustomParameter id="169" field="OPC" dataType="Text" parameterType="Control" parameterSource="P_CITY_COORDINATE_NAME"/>
<CustomParameter id="170" field="OPC" dataType="Text" parameterType="Control" parameterSource="P_COVERAGE_AREA_NAME"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_trunk.php" forShow="True" url="p_trunk.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_trunk_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="105"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="106"/>
			</Actions>
		</Event>
	</Events>
</Page>
