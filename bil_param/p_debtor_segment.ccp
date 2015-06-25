<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as p_ar_segment_name from p_debtor_segment a , p_ar_segment b
where a.p_ar_segment_id=b.p_ar_segment_id
and upper(a.code) like upper('%{s_keyword}%')" name="P_DEBTOR_SEGMENT" orderBy="P_DEBTOR_SEGMENT_ID" pageSizeLimit="100" wizardCaption=" P DEBTOR SEGMENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DEBTOR_SEGMENTCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_AR_SEGMENT_NAME" fieldSource="P_AR_SEGMENT_NAME" wizardCaption="P AR SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_DEBTOR_SEGMENTP_AR_SEGMENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="OLD_CODE" fieldSource="OLD_CODE" wizardCaption="OLD CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DEBTOR_SEGMENTOLD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_DEBTOR_SEGMENTDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="24" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_DEBTOR_SEGMENT_Insert" hrefSource="p_debtor_segment.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_DEBTOR_SEGMENTP_DEBTOR_SEGMENT_Insert" removeParameters="P_DEBTOR_SEGMENT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="39"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="40" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="41" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_DEBTOR_SEGMENTDLink" hrefSource="p_debtor_segment.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_DEBTOR_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="42" sourceType="DataField" name="P_DEBTOR_SEGMENT_ID" source="P_DEBTOR_SEGMENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="43" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_DEBTOR_SEGMENTADLink" hrefSource="p_debtor_segment.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_DEBTOR_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="44" sourceType="DataField" format="yyyy-mm-dd" name="P_DEBTOR_SEGMENT_ID" source="P_DEBTOR_SEGMENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_DEBTOR_SEGMENT_ID" fieldSource="P_DEBTOR_SEGMENT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_debtor_segment.ccp" wizardThemeItem="GridA" PathID="P_DEBTOR_SEGMENTP_DEBTOR_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_DEBTOR_SEGMENT_ID" source="P_DEBTOR_SEGMENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="45" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="46"/>
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
<SQLParameter id="83" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_DEBTOR_SEGMENTSearch" wizardCaption=" P DEBTOR SEGMENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_debtor_segment.ccp" PathID="P_DEBTOR_SEGMENTSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_DEBTOR_SEGMENTSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_DEBTOR_SEGMENTSearchButton_DoSearch">
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
		<Record id="25" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_debtor_segment1" dataSource="select a.*,b.code as p_ar_segment_name from p_debtor_segment a , p_ar_segment b
where a.p_ar_segment_id=b.p_ar_segment_id
and a.P_DEBTOR_SEGMENT_ID={P_DEBTOR_SEGMENT_ID}" errorSummator="Error" wizardCaption=" P Debtor Segment " wizardFormMethod="post" PathID="p_debtor_segment1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_DEBTOR_SEGMENT(P_DEBTOR_SEGMENT_ID, CODE, P_AR_SEGMENT_ID, OLD_CODE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES
(GENERATE_ID('TRB','P_DEBTOR_SEGMENT','P_DEBTOR_SEGMENT_ID'),UPPER(TRIM('{CODE}')),{P_AR_SEGMENT_ID},UPPER(TRIM('{OLD_CODE}')),'{DESCRIPTION}',sysdate, '{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_DEBTOR_SEGMENT SET 
CODE='{CODE}',
OLD_CODE='{OLD_CODE}',
P_AR_SEGMENT_ID={P_AR_SEGMENT_ID},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_DEBTOR_SEGMENT_ID = {P_DEBTOR_SEGMENT_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_DEBTOR_SEGMENT WHERE P_DEBTOR_SEGMENT_ID = {P_DEBTOR_SEGMENT_ID}">
			<Components>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_debtor_segment1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_AR_SEGMENT_ID" fieldSource="P_AR_SEGMENT_ID" required="True" caption="P AR SEGMENT ID" wizardCaption="P AR SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_debtor_segment1P_AR_SEGMENT_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OLD_CODE" fieldSource="OLD_CODE" required="False" caption="OLD CODE" wizardCaption="OLD CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_debtor_segment1OLD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_debtor_segment1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_debtor_segment1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_debtor_segment1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="48" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert1" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_debtor_segment1Button_Insert1" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="49" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update1" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_debtor_segment1Button_Update1" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete1" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_debtor_segment1Button_Delete1" removeParameters="TAMBAH;s_keyword">
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
				<Button id="52" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel1" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_debtor_segment1Button_Cancel1" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_AR_SEGMENT_NAME" fieldSource="P_AR_SEGMENT_NAME" required="False" caption="P AR SEGMENT ID" wizardCaption="P AR SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_debtor_segment1P_AR_SEGMENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_DEBTOR_SEGMENT_ID" fieldSource="P_DEBTOR_SEGMENT_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_debtor_segment1P_DEBTOR_SEGMENT_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_DEBTOR_SEGMENT_ID" parameterSource="P_DEBTOR_SEGMENT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="84" parameterType="URL" variable="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterSource="P_DEBTOR_SEGMENT_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="62" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="63" variable="OLD_CODE" parameterType="Control" dataType="Text" parameterSource="OLD_CODE"/>
<SQLParameter id="64" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="65" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="66" variable="P_AR_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_AR_SEGMENT_ID"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="55" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="56" field="P_AR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_AR_SEGMENT_ID"/>
				<CustomParameter id="57" field="OLD_CODE" dataType="Text" parameterType="Control" parameterSource="OLD_CODE"/>
				<CustomParameter id="58" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="59" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="60" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
				<CustomParameter id="61" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_AR_SEGMENT_NAME"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="76" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="77" variable="OLD_CODE" parameterType="Control" dataType="Text" parameterSource="OLD_CODE"/>
<SQLParameter id="78" variable="P_DEBTOR_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_DEBTOR_SEGMENT_ID"/>
<SQLParameter id="79" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="80" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="81" variable="P_AR_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_AR_SEGMENT_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="68" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="69" field="P_AR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_AR_SEGMENT_ID"/>
<CustomParameter id="70" field="OLD_CODE" dataType="Text" parameterType="Control" parameterSource="OLD_CODE"/>
<CustomParameter id="71" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="72" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="73" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="74" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_AR_SEGMENT_NAME"/>
<CustomParameter id="75" field="P_DEBTOR_SEGMENT_ID" dataType="Text" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="82" variable="P_DEBTOR_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_DEBTOR_SEGMENT_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_debtor_segment.php" forShow="True" url="p_debtor_segment.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_debtor_segment_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="47"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="53"/>
			</Actions>
		</Event>
	</Events>
</Page>
