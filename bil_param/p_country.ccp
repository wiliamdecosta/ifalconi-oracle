<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\msu_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,B.CODE as P_CURRENCY_NAME , C.COVERAGE_NAME as P_COVERAGE_AREA_NAME  from p_country a , P_CURRENCY b , P_COVERAGE_AREA c
where A.P_COVERAGE_AREA_ID=C.P_COVERAGE_AREA_ID and A.P_CURRENCY_ID=B.P_CURRENCY_ID" name="P_COUNTRY" orderBy="P_COUNTRY_ID" pageSizeLimit="100" wizardCaption=" P COUNTRY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_COUNTRYCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COVERAGE_AREA_NAME" fieldSource="P_COVERAGE_AREA_NAME" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_COUNTRYP_COVERAGE_AREA_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_CURRENCY_NAME" fieldSource="P_CURRENCY_NAME" wizardCaption="P CURRENCY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_COUNTRYP_CURRENCY_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="26" fieldSourceType="DBColumn" dataType="Float" html="False" name="TIME_REF" fieldSource="TIME_REF" wizardCaption="TIME REF" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_COUNTRYTIME_REF">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_COUNTRYDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="29" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_COUNTRY_Insert" hrefSource="p_country.ccp" removeParameters="P_COUNTRY_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_COUNTRYP_COUNTRY_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="52"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="53" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="54" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_COUNTRYDLink" hrefSource="p_country.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_COUNTRY_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="55" sourceType="DataField" name="P_COUNTRY_ID" source="P_COUNTRY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="56" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_COUNTRYADLink" hrefSource="p_country.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_COUNTRY_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="57" sourceType="DataField" format="yyyy-mm-dd" name="P_COUNTRY_ID" source="P_COUNTRY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_COUNTRY_ID" fieldSource="P_COUNTRY_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_country.ccp" wizardThemeItem="GridA" PathID="P_COUNTRYP_COUNTRY_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_COUNTRY_ID" source="P_COUNTRY_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="58" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="59"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="TIME_REF" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="48" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_COUNTRYSearch" wizardCaption=" P COUNTRY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_country.ccp" PathID="P_COUNTRYSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_COUNTRYSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_COUNTRYSearchButton_DoSearch">
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
<Record id="30" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_country1" dataSource="select a.*,B.CODE as P_CURRENCY_NAME , C.COVERAGE_NAME as P_COVERAGE_AREA_NAME  from p_country a , P_CURRENCY b , P_COVERAGE_AREA c
where A.P_COVERAGE_AREA_ID=C.P_COVERAGE_AREA_ID and A.P_CURRENCY_ID=B.P_CURRENCY_ID and
a.P_COUNTRY_ID = {P_COUNTRY_ID}" errorSummator="Error" wizardCaption=" P Country " wizardFormMethod="post" PathID="p_country1" pasteActions="pasteActions" activeCollection="DSQLParameters" parameterTypeListName="ParameterTypeList" customInsertType="SQL" customInsert="INSERT INTO P_COUNTRY(P_COUNTRY_ID,CODE,P_COVERAGE_AREA_ID,P_CURRENCY_ID,TIME_REF,DESCRIPTION,CREATION_DATE,CREATED_BY,UPDATED_DATE,UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_COUNTRY','P_COUNTRY_ID'),UPPER(TRIM('{CODE}')),{P_COVERAGE_AREA_ID},{P_CURRENCY_ID},{TIME_REF},'{DESCRIPTION}',sysdate,'{CREATED_BY}',sysdate,'{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_COUNTRY SET 
CODE=UPPER(TRIM('{CODE}')),
P_COVERAGE_AREA_ID={P_COVERAGE_AREA_ID},
P_CURRENCY_ID={P_CURRENCY_ID},
TIME_REF={TIME_REF},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_COUNTRY_ID = {P_COUNTRY_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_COUNTRY WHERE P_COUNTRY_ID = {P_COUNTRY_ID}">
<Components>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="TIME_REF" fieldSource="TIME_REF" required="False" caption="TIME REF" wizardCaption="TIME REF" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1TIME_REF">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1UPDATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="49" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_country1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_country1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_country1Button_Delete" removeParameters="TAMBAH;s_keyword">
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
<Button id="46" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_country1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<TextBox id="62" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COVERAGE_AREA_NAME" fieldSource="P_COVERAGE_AREA_NAME" required="False" caption="P_COVERAGE_AREA_NAME" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1P_COVERAGE_AREA_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CURRENCY_NAME" fieldSource="P_CURRENCY_NAME" required="False" caption="P_CURRENCY_NAME" wizardCaption="P CURRENCY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1P_CURRENCY_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COVERAGE_AREA_ID" fieldSource="P_COVERAGE_AREA_ID" required="False" caption="P COVERAGE AREA ID" wizardCaption="P COVERAGE AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1P_COVERAGE_AREA_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" required="False" caption="P CURRENCY ID" wizardCaption="P CURRENCY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1P_CURRENCY_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COUNTRY_ID" fieldSource="P_COUNTRY_ID" required="False" caption="P_COUNTRY_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_country1P_COUNTRY_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="36" conditionType="Parameter" useIsNull="False" field="P_COUNTRY_ID" parameterSource="P_COUNTRY_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="64" parameterType="URL" variable="P_COUNTRY_ID" dataType="Float" parameterSource="P_COUNTRY_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="87" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="88" variable="P_COVERAGE_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COVERAGE_AREA_ID"/>
<SQLParameter id="89" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
<SQLParameter id="90" variable="TIME_REF" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TIME_REF"/>
<SQLParameter id="91" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="92" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="93" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="76" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="77" field="TIME_REF" dataType="Float" parameterType="Control" parameterSource="TIME_REF"/>
<CustomParameter id="78" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="79" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="80" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="81" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="82" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="83" field="P_COVERAGE_AREA_NAME" dataType="Text" parameterType="Control" parameterSource="P_COVERAGE_AREA_NAME"/>
<CustomParameter id="84" field="P_CURRENCY_NAME" dataType="Text" parameterType="Control" parameterSource="P_CURRENCY_NAME"/>
<CustomParameter id="85" field="P_COVERAGE_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_COVERAGE_AREA_ID"/>
<CustomParameter id="86" field="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="95" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="96" variable="P_COVERAGE_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COVERAGE_AREA_ID"/>
<SQLParameter id="97" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
<SQLParameter id="98" variable="TIME_REF" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TIME_REF"/>
<SQLParameter id="99" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="101" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="102" variable="P_COUNTRY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COUNTRY_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="65" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="66" field="TIME_REF" dataType="Float" parameterType="Control" parameterSource="TIME_REF"/>
<CustomParameter id="67" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="68" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="69" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="70" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="71" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="72" field="P_COVERAGE_AREA_NAME" dataType="Text" parameterType="Control" parameterSource="P_COVERAGE_AREA_NAME"/>
<CustomParameter id="73" field="P_CURRENCY_NAME" dataType="Text" parameterType="Control" parameterSource="P_CURRENCY_NAME"/>
<CustomParameter id="74" field="P_COVERAGE_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_COVERAGE_AREA_ID"/>
<CustomParameter id="75" field="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="103" variable="P_COUNTRY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COUNTRY_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_country.php" forShow="True" url="p_country.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_country_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="60"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="61"/>
</Actions>
</Event>
</Events>
</Page>
