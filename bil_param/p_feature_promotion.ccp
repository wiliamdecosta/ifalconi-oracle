<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT
P_FEATURE_PROMOTION_ID,
CODE,
TO_CHAR(VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,
TO_CHAR(VALID_TO,'DD/MM/YYYY') AS VALID_TO,
DESCRIPTION,
UPDATE_DATE,
UPDATE_BY
FROM 
P_FEATURE_PROMOTION
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%')" name="P_FEATURE_PROMOTION" orderBy="P_FEATURE_PROMOTION_ID" pageSizeLimit="100" wizardCaption=" P FEATURE PROMOTION " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FEATURE_PROMOTION_ID" fieldSource="P_FEATURE_PROMOTION_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_feature_promotion.ccp" wizardThemeItem="GridA" PathID="P_FEATURE_PROMOTIONP_FEATURE_PROMOTION_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="14" sourceType="DataField" format="yyyy-mm-dd" name="P_FEATURE_PROMOTION_ID" source="P_FEATURE_PROMOTION_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FEATURE_PROMOTIONCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FEATURE_PROMOTIONVALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FEATURE_PROMOTIONVALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="21" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
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
<Link id="44" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_FEATURE_PROMOTIONDLink" hrefSource="p_feature_promotion.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="45" sourceType="DataField" name="P_FEATURE_PROMOTION_ID" source="P_FEATURE_PROMOTION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FEATURE_PROMOTION_Insert" hrefSource="p_tariff_scenario.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_FEATURE_PROMOTIONP_FEATURE_PROMOTION_Insert" removeParameters="P_TARIFF_SCENARIO_ID">
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
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="81" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_FEATURE_PROMOTIONSearch" wizardCaption=" P FEATURE PROMOTION " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_feature_promotion.ccp" PathID="P_FEATURE_PROMOTIONSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_FEATURE_PROMOTIONSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_FEATURE_PROMOTIONSearchButton_DoSearch">
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
<Record id="22" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_FEATURE_PROMOTION1" dataSource="SELECT
P_FEATURE_PROMOTION_ID,
CODE,
TO_CHAR(VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,
TO_CHAR(VALID_TO,'DD/MM/YYYY') AS VALID_TO,
DESCRIPTION,
UPDATE_DATE,
UPDATE_BY
FROM 
P_FEATURE_PROMOTION
WHERE P_FEATURE_PROMOTION_ID={P_FEATURE_PROMOTION_ID}" errorSummator="Error" wizardCaption=" P FEATURE PROMOTION " wizardFormMethod="post" PathID="P_FEATURE_PROMOTION1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_FEATURE_PROMOTION
(P_FEATURE_PROMOTION_ID, CODE, VALID_FROM, VALID_TO, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES
(GENERATE_ID('BILLDB','P_FEATURE_PROMOTION','P_FEATURE_PROMOTION_ID'),'{CODE}',TO_DATE('{VALID_FROM}','DD/MM/YYYY'),TO_DATE(NVL('{VALID_TO}',NULL),'DD/MM/YYYY'),'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_FEATURE_PROMOTION SET
CODE='{CODE}',
VALID_FROM=TO_DATE('{VALID_FROM}','DD/MM/YYYY'),
VALID_TO=TO_DATE(NVL('{VALID_TO}',NULL),'DD/MM/YYYY'),
DESCRIPTION='{DESCRIPTION}',
UPDATE_DATE=SYSDATE,
UPDATE_BY='{UPDATE_BY}'
WHERE P_FEATURE_PROMOTION_ID={P_FEATURE_PROMOTION_ID}" customDeleteType="SQL" customDelete="DELETE P_FEATURE_PROMOTION WHERE P_FEATURE_PROMOTION_ID={P_FEATURE_PROMOTION_ID}">
<Components>
<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FEATURE_PROMOTION1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FEATURE_PROMOTION1VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="31" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FEATURE_PROMOTION1DatePicker_VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextArea id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FEATURE_PROMOTION1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FEATURE_PROMOTION1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="36" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FEATURE_PROMOTION1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FEATURE_PROMOTION1VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="33" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FEATURE_PROMOTION1DatePicker_VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FEATURE_PROMOTION1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="38" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="P_FEATURE_PROMOTION1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="39" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_FEATURE_PROMOTION1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="P_FEATURE_PROMOTION1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="41"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_FEATURE_PROMOTION1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_PROMOTION_ID" fieldSource="P_FEATURE_PROMOTION_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FEATURE_PROMOTION1P_FEATURE_PROMOTION_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_FEATURE_PROMOTION_ID" parameterSource="P_FEATURE_PROMOTION_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="66" parameterType="URL" variable="P_FEATURE_PROMOTION_ID" dataType="Float" parameterSource="P_FEATURE_PROMOTION_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="61" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="62" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
<SQLParameter id="63" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="64" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="65" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="54" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="55" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="56" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="57" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="58" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="59" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="60" field="P_FEATURE_PROMOTION_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_PROMOTION_ID"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="74" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="75" variable="P_FEATURE_PROMOTION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FEATURE_PROMOTION_ID"/>
<SQLParameter id="76" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
<SQLParameter id="77" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="78" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="79" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="67" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="68" field="VALID_FROM" dataType="Text" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="69" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="70" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="71" field="VALID_TO" dataType="Text" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="72" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="73" field="P_FEATURE_PROMOTION_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_PROMOTION_ID"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="80" variable="P_FEATURE_PROMOTION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FEATURE_PROMOTION_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_feature_promotion.php" forShow="True" url="p_feature_promotion.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_feature_promotion_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
