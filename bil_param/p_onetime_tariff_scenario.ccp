<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT 
A.P_ONETIME_TARIFF_SCENARIO_ID,
A.CODE,
A.P_SERVICE_TYPE_ID,
TO_CHAR(A.VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,
TO_CHAR(A.VALID_TO,'DD/MM/YYYY') AS VALID_TO, 
A.DESCRIPTION, 
A.UPDATE_DATE, 
A.UPDATE_BY,
B.CODE AS P_SERVICE_TYPE_NAME
FROM P_ONETIME_TARIFF_SCENARIO A ,P_SERVICE_TYPE B 
WHERE A.P_SERVICE_TYPE_ID=B.P_SERVICE_TYPE_ID
AND UPPER(A.CODE) LIKE UPPER('%{s_keyword}%')" name="P_ONETIME_TARIFF_SCENARIO" orderBy="P_ONETIME_TARIFF_SCENARIO_ID" pageSizeLimit="100" wizardCaption=" P ONETIME TARIFF SCENARIO " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ONETIME_TARIFF_SCENARIOCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ONETIME_TARIFF_SCENARIOP_SERVICE_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ONETIME_TARIFF_SCENARIOVALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ONETIME_TARIFF_SCENARIOVALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="24" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="53"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ONETIME_TARIFF_SCENARIO_Insert" hrefSource="p_tariff_scenario.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIOP_ONETIME_TARIFF_SCENARIO_Insert" removeParameters="P_TARIFF_SCENARIO_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="43"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="44" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="51" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_ONETIME_TARIFF_SCENARIODLink" hrefSource="p_onetime_tariff_scenario.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="52" sourceType="DataField" name="P_ONETIME_TARIFF_SCENARIO_ID" source="P_ONETIME_TARIFF_SCENARIO_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ONETIME_TARIFF_SCENARIO_ID" fieldSource="P_ONETIME_TARIFF_SCENARIO_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_onetime_tariff_scenario.ccp" wizardThemeItem="GridA" PathID="P_ONETIME_TARIFF_SCENARIOP_ONETIME_TARIFF_SCENARIO_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_ONETIME_TARIFF_SCENARIO_ID" source="P_ONETIME_TARIFF_SCENARIO_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="54"/>
<Action actionName="Set Row Style" actionCategory="General" id="55" styles="Row;AltRow"/>
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
<SQLParameter id="92" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_ONETIME_TARIFF_SCENARIOSearch" wizardCaption=" P ONETIME TARIFF SCENARIO " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_onetime_tariff_scenario.ccp" PathID="P_ONETIME_TARIFF_SCENARIOSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_ONETIME_TARIFF_SCENARIOSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_ONETIME_TARIFF_SCENARIOSearchButton_DoSearch">
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
<Record id="25" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_ONETIME_TARIFF_SCENARIO1" dataSource="SELECT 
A.P_ONETIME_TARIFF_SCENARIO_ID,
A.CODE,
A.P_SERVICE_TYPE_ID,
TO_CHAR(A.VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,
TO_CHAR(A.VALID_TO,'DD/MM/YYYY') AS VALID_TO, 
A.DESCRIPTION, 
A.UPDATE_DATE, 
A.UPDATE_BY,
B.CODE AS P_SERVICE_TYPE_NAME
FROM P_ONETIME_TARIFF_SCENARIO A ,P_SERVICE_TYPE B 
WHERE A.P_SERVICE_TYPE_ID=B.P_SERVICE_TYPE_ID
AND A.P_ONETIME_TARIFF_SCENARIO_ID={P_ONETIME_TARIFF_SCENARIO_ID}" errorSummator="Error" wizardCaption=" P ONETIME TARIFF SCENARIO " wizardFormMethod="post" PathID="P_ONETIME_TARIFF_SCENARIO1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_ONETIME_TARIFF_SCENARIO
(P_ONETIME_TARIFF_SCENARIO_ID,CODE,P_SERVICE_TYPE_ID,VALID_FROM,VALID_TO,DESCRIPTION,UPDATE_DATE,UPDATE_BY)
VALUES
(GENERATE_ID('BILLDB','P_ONETIME_TARIFF_SCENARIO','P_ONETIME_TARIFF_SCENARIO_ID'),'{CODE}',{P_SERVICE_TYPE_ID},TO_DATE('{VALID_FROM}','DD/MM/YYYY'),TO_DATE(NVL('{VALID_TO}',NULL),'DD/MM/YYYY'),'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_ONETIME_TARIFF_SCENARIO SET
CODE='{CODE}',
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID},
VALID_FROM=TO_DATE('{VALID_FROM}','DD/MM/YYYY'),
VALID_TO=TO_DATE(NVL('{VALID_TO}',NULL),'DD/MM/YYYY'),
DESCRIPTION='{DESCRIPTION}',
UPDATE_DATE=SYSDATE,
UPDATE_BY='{UPDATE_BY}'
WHERE P_ONETIME_TARIFF_SCENARIO_ID={P_ONETIME_TARIFF_SCENARIO_ID}" customDeleteType="SQL" customDelete="DELETE P_ONETIME_TARIFF_SCENARIO WHERE P_ONETIME_TARIFF_SCENARIO_ID={P_ONETIME_TARIFF_SCENARIO_ID}">
<Components>
<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="35" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_ONETIME_TARIFF_SCENARIO1DatePicker_VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextArea id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="40" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_ONETIME_TARIFF_SCENARIO1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="37" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_ONETIME_TARIFF_SCENARIO1DatePicker_VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="45" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="P_ONETIME_TARIFF_SCENARIO1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="46" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_ONETIME_TARIFF_SCENARIO1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="47" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="P_ONETIME_TARIFF_SCENARIO1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="48"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="49" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_ONETIME_TARIFF_SCENARIO1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ONETIME_TARIFF_SCENARIO_ID" fieldSource="P_ONETIME_TARIFF_SCENARIO_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1P_ONETIME_TARIFF_SCENARIO_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="True" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1P_SERVICE_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" required="False" caption="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ONETIME_TARIFF_SCENARIO1P_SERVICE_TYPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
<Events/>
<TableParameters>
<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_ONETIME_TARIFF_SCENARIO_ID" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="90" parameterType="URL" variable="P_ONETIME_TARIFF_SCENARIO_ID" dataType="Float" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="68" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="69" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="70" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
<SQLParameter id="71" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="72" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="73" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="59" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="60" field="VALID_FROM" dataType="Text" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="61" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="62" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="63" field="VALID_TO" dataType="Text" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="64" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="65" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE1"/>
<CustomParameter id="66" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="67" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="83" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="84" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="85" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
<SQLParameter id="86" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="87" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="88" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="89" variable="P_ONETIME_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="74" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="75" field="VALID_FROM" dataType="Text" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="76" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="77" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="78" field="VALID_TO" dataType="Text" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="79" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="80" field="P_ONETIME_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID"/>
<CustomParameter id="81" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="82" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="91" variable="P_ONETIME_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_onetime_tariff_scenario.php" forShow="True" url="p_onetime_tariff_scenario.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_onetime_tariff_scenario_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="56"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="57"/>
</Actions>
</Event>
</Events>
</Page>
