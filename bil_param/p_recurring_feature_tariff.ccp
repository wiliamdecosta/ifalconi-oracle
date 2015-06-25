<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" dataSource="SELECT A.P_RECURRING_FEATURE_TARIFF_ID,
A.P_RECURR_TARIFF_SCENARIO_ID,
A.P_SERVICE_CATEGORY_ID,
TO_CHAR(A.VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,
TO_CHAR(A.VALID_TO,'DD/MM/YYYY') AS VALID_TO,
A.P_BILLING_PERIOD_UNIT_ID,
A.BILLING_UNIT, 
A.DESCRIPTION,
A.UPDATE_DATE,
A.UPDATE_BY,
B.CODE AS P_RECURR_TARIFF_SCENARIO_NAME,
C.CODE AS P_SERVICE_CATEGORY_NAME
FROM P_RECURRING_FEATURE_TARIFF A,P_RECURRING_TARIFF_SCENARIO B,P_SERVICE_CATEGORY C,P_BILLING_PERIOD_UNIT D
WHERE A.P_RECURR_TARIFF_SCENARIO_ID=B.P_RECURR_TARIFF_SCENARIO_ID
AND A.P_SERVICE_CATEGORY_ID=C.P_SERVICE_CATEGORY_ID
AND A.P_BILLING_PERIOD_UNIT_ID=D.P_BILLING_PERIOD_UNIT_ID
AND UPPER(B.CODE) LIKE UPPER('%{s_keyword}%')" name="P_RECURRING_FEATURE_TARIF1" orderBy="P_RECURRING_FEATURE_TARIFF_ID" pageSizeLimit="100" wizardCaption=" P RECURRING FEATURE TARIFF " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_RECURRING_FEATURE_TARIFF_ID" fieldSource="P_RECURRING_FEATURE_TARIFF_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_recurring_feature_tariff.ccp" wizardThemeItem="GridA" PathID="P_RECURRING_FEATURE_TARIF1P_RECURRING_FEATURE_TARIFF_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_RECURRING_FEATURE_TARIFF_ID" source="P_RECURRING_FEATURE_TARIFF_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_RECURR_TARIFF_SCENARIO_NAME" fieldSource="P_RECURR_TARIFF_SCENARIO_NAME" wizardCaption="P RECURR TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_RECURRING_FEATURE_TARIF1P_RECURR_TARIFF_SCENARIO_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_SERVICE_CATEGORY_NAME" fieldSource="P_SERVICE_CATEGORY_NAME" wizardCaption="P SERVICE CATEGORY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_RECURRING_FEATURE_TARIF1P_SERVICE_CATEGORY_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_RECURRING_FEATURE_TARIF1VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_RECURRING_FEATURE_TARIF1VALID_TO">
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
<Action actionName="Custom Code" actionCategory="General" id="49"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="44" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_RECURRING_FEATURE_TARIF1DLink" hrefSource="p_recurring_feature_tariff.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="45" sourceType="DataField" name="P_RECURRING_FEATURE_TARIFF_ID" source="P_RECURRING_FEATURE_TARIFF_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_RECURRING_FEATURE_TARIF1_Insert" hrefSource="p_tariff_scenario.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF1P_RECURRING_FEATURE_TARIF1_Insert" removeParameters="P_TARIFF_SCENARIO_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="47"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="48" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="50"/>
<Action actionName="Set Row Style" actionCategory="General" id="51" styles="Row;AltRow"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="105" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_RECURRING_FEATURE_TARIF" wizardCaption=" P RECURRING FEATURE TARIF " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_recurring_feature_tariff.ccp" PathID="P_RECURRING_FEATURE_TARIF" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_RECURRING_FEATURE_TARIFs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_RECURRING_FEATURE_TARIFButton_DoSearch">
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
<Record id="25" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_RECURRING_FEATURE_TARIF2" dataSource="SELECT A.P_RECURRING_FEATURE_TARIFF_ID,
A.P_RECURR_TARIFF_SCENARIO_ID,
A.P_SERVICE_CATEGORY_ID,
TO_CHAR(A.VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,
TO_CHAR(A.VALID_TO,'DD/MM/YYYY') AS VALID_TO,
A.P_BILLING_PERIOD_UNIT_ID,
A.BILLING_UNIT, 
A.DESCRIPTION,
A.UPDATE_DATE,
A.UPDATE_BY,
B.CODE AS P_RECURR_TARIFF_SCENARIO_NAME,
C.CODE AS P_SERVICE_CATEGORY_NAME
FROM P_RECURRING_FEATURE_TARIFF A,P_RECURRING_TARIFF_SCENARIO B,P_SERVICE_CATEGORY C,P_BILLING_PERIOD_UNIT D
WHERE A.P_RECURR_TARIFF_SCENARIO_ID=B.P_RECURR_TARIFF_SCENARIO_ID
AND A.P_SERVICE_CATEGORY_ID=C.P_SERVICE_CATEGORY_ID
AND A.P_BILLING_PERIOD_UNIT_ID=D.P_BILLING_PERIOD_UNIT_ID
AND A.P_RECURRING_FEATURE_TARIFF_ID ={P_RECURRING_FEATURE_TARIFF_ID}" errorSummator="Error" wizardCaption=" P RECURRING FEATURE TARIFF " wizardFormMethod="post" PathID="P_RECURRING_FEATURE_TARIF2" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_RECURRING_FEATURE_TARIFF
(P_RECURRING_FEATURE_TARIFF_ID, P_RECURR_TARIFF_SCENARIO_ID, P_SERVICE_CATEGORY_ID, VALID_FROM, VALID_TO, P_BILLING_PERIOD_UNIT_ID, BILLING_UNIT, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES
(GENERATE_ID('BILLDB','P_RECURRING_FEATURE_TARIFF','P_RECURRING_FEATURE_TARIFF_ID'),{P_RECURR_TARIFF_SCENARIO_ID},{P_SERVICE_CATEGORY_ID},TO_DATE('{VALID_FROM}','DD/MM/YYYY'),TO_DATE(NVL('{VALID_TO}',NULL),'DD/MM/YYYY'),{P_BILLING_PERIOD_UNIT_ID},{BILLING_UNIT},'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_RECURRING_FEATURE_TARIFF SET
P_RECURR_TARIFF_SCENARIO_ID={P_RECURR_TARIFF_SCENARIO_ID},
P_SERVICE_CATEGORY_ID={P_SERVICE_CATEGORY_ID},
VALID_FROM=TO_DATE('{VALID_FROM}','DD/MM/YYYY'),
VALID_TO=TO_DATE(NVL('{VALID_TO}',NULL),'DD/MM/YYYY'),
P_BILLING_PERIOD_UNIT_ID={P_BILLING_PERIOD_UNIT_ID},
BILLING_UNIT={BILLING_UNIT},
DESCRIPTION='{DESCRIPTION}',
UPDATE_DATE=SYSDATE,
UPDATE_BY='{UPDATE_BY}'
WHERE P_RECURRING_FEATURE_TARIFF_ID={P_RECURRING_FEATURE_TARIFF_ID}" customDeleteType="SQL" customDelete="DELETE P_RECURRING_FEATURE_TARIFF WHERE P_RECURRING_FEATURE_TARIFF_ID ={P_RECURRING_FEATURE_TARIFF_ID}">
<Components>
<Hidden id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_RECURR_TARIFF_SCENARIO_ID" fieldSource="P_RECURR_TARIFF_SCENARIO_ID" required="True" caption="P RECURR TARIFF SCENARIO ID" wizardCaption="P RECURR TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2P_RECURR_TARIFF_SCENARIO_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_CATEGORY_ID" fieldSource="P_SERVICE_CATEGORY_ID" required="True" caption="P SERVICE CATEGORY ID" wizardCaption="P SERVICE CATEGORY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2P_SERVICE_CATEGORY_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="35" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_RECURRING_FEATURE_TARIF2DatePicker_VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<ListBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" required="True" caption="P BILLING PERIOD UNIT ID" wizardCaption="P BILLING PERIOD UNIT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2P_BILLING_PERIOD_UNIT_ID" sourceType="SQL" connection="Conn" dataSource="SELECT * FROM P_BILLING_PERIOD_UNIT" boundColumn="P_BILLING_PERIOD_UNIT_ID" textColumn="CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
<TableParameters/>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
</ListBox>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="BILLING_UNIT" fieldSource="BILLING_UNIT" required="True" caption="BILLING UNIT" wizardCaption="BILLING UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2BILLING_UNIT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="42" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_RECURRING_FEATURE_TARIF2DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="37" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_RECURRING_FEATURE_TARIF2DatePicker_VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="54" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="P_RECURRING_FEATURE_TARIF2Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="55" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_RECURRING_FEATURE_TARIF2Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="56" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="P_RECURRING_FEATURE_TARIF2Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="57"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_RECURRING_FEATURE_TARIF2Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_RECURRING_FEATURE_TARIFF_ID" fieldSource="P_RECURRING_FEATURE_TARIFF_ID" required="False" caption="P RECURR TARIFF SCENARIO ID" wizardCaption="P RECURR TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2P_RECURRING_FEATURE_TARIFF_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_RECURR_TARIFF_SCENARIO_NAME" fieldSource="P_RECURR_TARIFF_SCENARIO_NAME" required="False" caption="P RECURR TARIFF SCENARIO ID" wizardCaption="P RECURR TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2P_RECURR_TARIFF_SCENARIO_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_CATEGORY_NAME" fieldSource="P_SERVICE_CATEGORY_NAME" required="False" caption="P SERVICE CATEGORY ID" wizardCaption="P SERVICE CATEGORY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_RECURRING_FEATURE_TARIF2P_SERVICE_CATEGORY_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
<Events/>
<TableParameters>
<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_RECURRING_FEATURE_TARIFF_ID" parameterSource="P_RECURRING_FEATURE_TARIFF_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="103" parameterType="URL" variable="P_RECURRING_FEATURE_TARIFF_ID" dataType="Float" parameterSource="P_RECURRING_FEATURE_TARIFF_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="74" variable="P_RECURR_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<SQLParameter id="75" variable="P_SERVICE_CATEGORY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_CATEGORY_ID"/>
<SQLParameter id="76" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
<SQLParameter id="77" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="78" variable="P_BILLING_PERIOD_UNIT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<SQLParameter id="79" variable="BILLING_UNIT" parameterType="Control" dataType="Integer" parameterSource="BILLING_UNIT" defaultValue="0"/>
<SQLParameter id="80" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="81" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="62" field="P_RECURR_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<CustomParameter id="63" field="P_SERVICE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_CATEGORY_ID"/>
<CustomParameter id="64" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="65" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<CustomParameter id="66" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
<CustomParameter id="67" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="68" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="69" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="70" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="71" field="P_RECURRING_FEATURE_TARIFF_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURRING_FEATURE_TARIFF_ID"/>
<CustomParameter id="72" field="P_RECURR_TARIFF_SCENARIO_ID" dataType="Text" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_NAME"/>
<CustomParameter id="73" field="P_SERVICE_CATEGORY_ID" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_CATEGORY_NAME"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="94" variable="P_RECURR_TARIFF_SCENARIO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<SQLParameter id="95" variable="P_SERVICE_CATEGORY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_CATEGORY_ID"/>
<SQLParameter id="96" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
<SQLParameter id="97" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="98" variable="P_BILLING_PERIOD_UNIT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<SQLParameter id="99" variable="BILLING_UNIT" parameterType="Control" defaultValue="0" dataType="Integer" parameterSource="BILLING_UNIT"/>
<SQLParameter id="100" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="101" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="102" variable="P_RECURRING_FEATURE_TARIFF_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_RECURRING_FEATURE_TARIFF_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="82" field="P_RECURR_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<CustomParameter id="83" field="P_SERVICE_CATEGORY_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_CATEGORY_ID"/>
<CustomParameter id="84" field="VALID_FROM" dataType="Text" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="85" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<CustomParameter id="86" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
<CustomParameter id="87" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="88" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="89" field="VALID_TO" dataType="Text" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="90" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="91" field="P_RECURRING_FEATURE_TARIFF_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURRING_FEATURE_TARIFF_ID"/>
<CustomParameter id="92" field="P_RECURR_TARIFF_SCENARIO_ID" dataType="Text" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_NAME"/>
<CustomParameter id="93" field="P_SERVICE_CATEGORY_ID" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_CATEGORY_NAME"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="104" variable="P_RECURRING_FEATURE_TARIFF_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_RECURRING_FEATURE_TARIFF_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_recurring_feature_tariff.php" forShow="True" url="p_recurring_feature_tariff.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_recurring_feature_tariff_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="52"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="53"/>
</Actions>
</Event>
</Events>
</Page>
