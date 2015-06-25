<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" dataSource="SELECT A.* , B.CODE AS P_SERVICE_TYPE_NAME , C.CODE AS P_USAGE_TARIFF_SCENARIO_NAME,
D.CODE AS P_ONETIME_TARIFF_SCENARIO_NAME , E.CODE AS P_RECURR_TARIFF_SCENARIO_NAME FROM 
P_TARIFF_SCENARIO A ,
P_SERVICE_TYPE B,
P_USAGE_TARIFF_SCENARIO C,
P_ONETIME_TARIFF_SCENARIO D,
P_RECURRING_TARIFF_SCENARIO E
WHERE A.P_SERVICE_TYPE_ID = B.P_SERVICE_TYPE_ID AND
A.P_USAGE_TARIFF_SCENARIO_ID = C.P_USAGE_TARIFF_SCENARIO_ID AND
A.P_ONETIME_TARIFF_SCENARIO_ID = D.P_ONETIME_TARIFF_SCENARIO_ID AND
A.P_RECURR_TARIFF_SCENARIO_ID = E.P_RECURR_TARIFF_SCENARIO_ID AND 
(UPPER(A.CODE) LIKE UPPER('%{s_keyword}%'))" name="P_TARIFF_SCENARIO" orderBy="P_TARIFF_SCENARIO_ID" pageSizeLimit="100" wizardCaption=" P TARIFF SCENARIO " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
			<Components>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_TARIFF_SCENARIOCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_TARIFF_SCENARIOP_SERVICE_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_USAGE_TARIFF_SCENARIO_NAME" fieldSource="P_USAGE_TARIFF_SCENARIO_NAME" wizardCaption="P USAGE TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_TARIFF_SCENARIOP_USAGE_TARIFF_SCENARIO_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_ONETIME_TARIFF_SCENARIO_NAME" fieldSource="P_ONETIME_TARIFF_SCENARIO_NAME" wizardCaption="P ONETIME TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_TARIFF_SCENARIOP_ONETIME_TARIFF_SCENARIO_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_RECURR_TARIFF_SCENARIO_NAME" fieldSource="P_RECURR_TARIFF_SCENARIO_NAME" wizardCaption="P RECURR TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_TARIFF_SCENARIOP_RECURR_TARIFF_SCENARIO_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="27" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="59"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="54" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_TARIFF_SCENARIODLink" hrefSource="p_tariff_scenario.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="55" sourceType="DataField" name="P_TARIFF_SCENARIO_ID" source="P_TARIFF_SCENARIO_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_TARIFF_SCENARIO_Insert" hrefSource="p_tariff_scenario.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIOP_TARIFF_SCENARIO_Insert" removeParameters="P_TARIFF_SCENARIO_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="57"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="58" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_TARIFF_SCENARIO_ID" fieldSource="P_TARIFF_SCENARIO_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_tariff_scenario.ccp" wizardThemeItem="GridA" PathID="P_TARIFF_SCENARIOP_TARIFF_SCENARIO_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="16" sourceType="DataField" format="yyyy-mm-dd" name="P_TARIFF_SCENARIO_ID" source="P_TARIFF_SCENARIO_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="60"/>
						<Action actionName="Set Row Style" actionCategory="General" id="61" styles="Row;AltRow"/>
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
				<SQLParameter id="64" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_TARIFF_SCENARIOSearch" wizardCaption=" P TARIFF SCENARIO " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_tariff_scenario.ccp" PathID="P_TARIFF_SCENARIOSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_TARIFF_SCENARIOSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_TARIFF_SCENARIOSearchButton_DoSearch">
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
		<Record id="28" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_TARIFF_SCENARIO1" dataSource="SELECT
A.P_TARIFF_SCENARIO_ID,
A.CODE,
A.P_SERVICE_TYPE_ID,
A.P_USAGE_TARIFF_SCENARIO_ID,
A.P_ONETIME_TARIFF_SCENARIO_ID,
A.P_RECURR_TARIFF_SCENARIO_ID,
TO_CHAR(A.VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,
TO_CHAR(A.VALID_TO,'DD/MM/YYYY') AS VALID_TO,
A.DESCRIPTION,
A.UPDATE_DATE,
A.UPDATE_BY,
B.CODE AS P_SERVICE_TYPE_NAME,
C.CODE AS P_USAGE_TARIFF_SCENARIO_NAME,
D.CODE AS P_ONETIME_TARIFF_SCENARIO_NAME,
E.CODE AS P_RECURRI_TARIFF_SCENARIO_NAME
FROM P_TARIFF_SCENARIO A,P_SERVICE_TYPE B,P_USAGE_TARIFF_SCENARIO C,P_ONETIME_TARIFF_SCENARIO D,P_RECURRING_TARIFF_SCENARIO E
WHERE A.P_SERVICE_TYPE_ID=B.P_SERVICE_TYPE_ID
AND A.P_USAGE_TARIFF_SCENARIO_ID=C.P_USAGE_TARIFF_SCENARIO_ID
AND A.P_ONETIME_TARIFF_SCENARIO_ID=D.P_ONETIME_TARIFF_SCENARIO_ID
AND A.P_RECURR_TARIFF_SCENARIO_ID=E.P_RECURR_TARIFF_SCENARIO_ID
AND P_TARIFF_SCENARIO_ID={P_TARIFF_SCENARIO_ID}" errorSummator="Error" wizardCaption=" P TARIFF SCENARIO " wizardFormMethod="post" PathID="P_TARIFF_SCENARIO1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_TARIFF_SCENARIO
(P_TARIFF_SCENARIO_ID, CODE, P_SERVICE_TYPE_ID, P_USAGE_TARIFF_SCENARIO_ID, P_ONETIME_TARIFF_SCENARIO_ID, P_RECURR_TARIFF_SCENARIO_ID, VALID_FROM, VALID_TO, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES
(GENERATE_ID('BILLDB','P_TARIFF_SCENARIO','P_TARIFF_SCENARIO_ID'),'{CODE}',{P_SERVICE_TYPE_ID},{P_USAGE_TARIFF_SCENARIO_ID},{P_ONETIME_TARIFF_SCENARIO_ID},{P_RECURR_TARIFF_SCENARIO_ID},TO_DATE('{VALID_FROM}','DD/MM/YYYY'),TO_DATE(NVL('{VALID_TO}',NULL),'DD/MM/YYYY'),'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_TARIFF_SCENARIO SET
CODE = '{CODE}',
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID},
P_USAGE_TARIFF_SCENARIO_ID={P_USAGE_TARIFF_SCENARIO_ID},
P_ONETIME_TARIFF_SCENARIO_ID={P_ONETIME_TARIFF_SCENARIO_ID},
P_RECURR_TARIFF_SCENARIO_ID={P_RECURR_TARIFF_SCENARIO_ID},
VALID_FROM=TO_DATE('{VALID_FROM}','DD/MM/YYYY'),
VALID_TO=TO_DATE(NVL('{VALID_TO}',NULL),'DD/MM/YYYY'),
DESCRIPTION='{DESCRIPTION}',
UPDATE_DATE=SYSDATE,
UPDATE_BY='{UPDATE_BY}'
WHERE P_TARIFF_SCENARIO_ID={P_TARIFF_SCENARIO_ID}" customDeleteType="SQL" customDelete="DELETE P_TARIFF_SCENARIO WHERE P_TARIFF_SCENARIO_ID={P_TARIFF_SCENARIO_ID}" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters">
			<Components>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="True" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_SERVICE_TYPE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_USAGE_TARIFF_SCENARIO_ID" fieldSource="P_USAGE_TARIFF_SCENARIO_ID" required="True" caption="P USAGE TARIFF SCENARIO ID" wizardCaption="P USAGE TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_USAGE_TARIFF_SCENARIO_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ONETIME_TARIFF_SCENARIO_ID" fieldSource="P_ONETIME_TARIFF_SCENARIO_ID" required="True" caption="P ONETIME TARIFF SCENARIO ID" wizardCaption="P ONETIME TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_ONETIME_TARIFF_SCENARIO_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_RECURR_TARIFF_SCENARIO_ID" fieldSource="P_RECURR_TARIFF_SCENARIO_ID" required="True" caption="P RECURR TARIFF SCENARIO ID" wizardCaption="P RECURR TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_RECURR_TARIFF_SCENARIO_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="41" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_TARIFF_SCENARIO1DatePicker_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="46" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_TARIFF_SCENARIO1DatePicker_UPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="48" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="P_TARIFF_SCENARIO1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="49" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_TARIFF_SCENARIO1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="P_TARIFF_SCENARIO1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="51"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="52" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_TARIFF_SCENARIO1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_TARIFF_SCENARIO_ID" fieldSource="P_TARIFF_SCENARIO_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_TARIFF_SCENARIO_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="43" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_TARIFF_SCENARIO1DatePicker_VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" required="False" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_SERVICE_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_USAGE_TARIFF_SCENARIO_NAME" fieldSource="P_USAGE_TARIFF_SCENARIO_NAME" required="False" caption="P USAGE TARIFF SCENARIO ID" wizardCaption="P USAGE TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_USAGE_TARIFF_SCENARIO_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_ONETIME_TARIFF_SCENARIO_NAME" fieldSource="P_ONETIME_TARIFF_SCENARIO_NAME" required="False" caption="P ONETIME TARIFF SCENARIO ID" wizardCaption="P ONETIME TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_ONETIME_TARIFF_SCENARIO_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_RECURR_TARIFF_SCENARIO_NAME" fieldSource="P_RECURRI_TARIFF_SCENARIO_NAME" required="False" caption="P RECURR TARIFF SCENARIO ID" wizardCaption="P RECURR TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TARIFF_SCENARIO1P_RECURR_TARIFF_SCENARIO_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="P_TARIFF_SCENARIO_ID" parameterSource="P_TARIFF_SCENARIO_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="119" parameterType="URL" variable="P_TARIFF_SCENARIO_ID" dataType="Float" parameterSource="P_TARIFF_SCENARIO_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="84" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="85" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="86" variable="P_USAGE_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_USAGE_TARIFF_SCENARIO_ID"/>
<SQLParameter id="87" variable="P_ONETIME_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID"/>
<SQLParameter id="88" variable="P_RECURR_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<SQLParameter id="89" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
<SQLParameter id="90" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="91" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="92" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
			<IFormElements>
<CustomParameter id="69" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="70" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="71" field="P_USAGE_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_USAGE_TARIFF_SCENARIO_ID"/>
<CustomParameter id="72" field="P_ONETIME_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID"/>
<CustomParameter id="73" field="P_RECURR_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<CustomParameter id="74" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="75" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="76" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="77" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="78" field="P_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_TARIFF_SCENARIO_ID"/>
<CustomParameter id="79" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="80" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
<CustomParameter id="81" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_USAGE_TARIFF_SCENARIO_NAME"/>
<CustomParameter id="82" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_ONETIME_TARIFF_SCENARIO_NAME"/>
<CustomParameter id="83" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_NAME"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="109" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="110" variable="P_USAGE_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_USAGE_TARIFF_SCENARIO_ID"/>
<SQLParameter id="111" variable="P_ONETIME_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID"/>
<SQLParameter id="112" variable="P_RECURR_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<SQLParameter id="113" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="114" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
<SQLParameter id="115" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="116" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="117" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="118" variable="P_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TARIFF_SCENARIO_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="94" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="95" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="96" field="P_USAGE_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_USAGE_TARIFF_SCENARIO_ID"/>
<CustomParameter id="97" field="P_ONETIME_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_ONETIME_TARIFF_SCENARIO_ID"/>
<CustomParameter id="98" field="P_RECURR_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<CustomParameter id="99" field="VALID_FROM" dataType="Text" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="100" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="101" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="102" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="103" field="P_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_TARIFF_SCENARIO_ID"/>
<CustomParameter id="104" field="VALID_TO" dataType="Text" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="105" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
<CustomParameter id="106" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_USAGE_TARIFF_SCENARIO_NAME"/>
<CustomParameter id="107" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_ONETIME_TARIFF_SCENARIO_NAME"/>
<CustomParameter id="108" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_NAME"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="93" variable="P_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TARIFF_SCENARIO_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_tariff_scenario.php" forShow="True" url="p_tariff_scenario.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_tariff_scenario_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="62"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="63"/>
			</Actions>
		</Event>
	</Events>
</Page>
