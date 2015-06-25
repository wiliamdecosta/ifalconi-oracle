<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\msu_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="p_switch_type" name="P_SWITCH_TYPE" orderBy="P_SWITCH_TYPE_ID" pageSizeLimit="100" wizardCaption=" P SWITCH TYPE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SWITCH_TYPECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="GENSOFT" fieldSource="GENSOFT" wizardCaption="GENSOFT" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SWITCH_TYPEGENSOFT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUTOFF_M1" fieldSource="CUTOFF_M1" wizardCaption="CUTOFF M1" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SWITCH_TYPECUTOFF_M1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUTOFF_M2" fieldSource="CUTOFF_M2" wizardCaption="CUTOFF M2" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SWITCH_TYPECUTOFF_M2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUTOFF_M3" fieldSource="CUTOFF_M3" wizardCaption="CUTOFF M3" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SWITCH_TYPECUTOFF_M3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUTOFF_M4" fieldSource="CUTOFF_M4" wizardCaption="CUTOFF M4" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SWITCH_TYPECUTOFF_M4">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SWITCH_TYPEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="46" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SWITCH_TYPE_Insert" hrefSource="p_switch_type.ccp" removeParameters="P_SWITCH_TYPE_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_SWITCH_TYPEP_SWITCH_TYPE_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="72"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="73" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="98" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_SWITCH_TYPEDLink" hrefSource="p_switch_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SWITCH_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="48" sourceType="DataField" name="P_SWITCH_TYPE_ID" source="P_SWITCH_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="49" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_SWITCH_TYPEADLink" hrefSource="p_switch_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SWITCH_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="50" sourceType="DataField" format="yyyy-mm-dd" name="P_SWITCH_TYPE_ID" source="P_SWITCH_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SWITCH_TYPE_ID" fieldSource="P_SWITCH_TYPE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_switch_type.ccp" wizardThemeItem="GridA" PathID="P_SWITCH_TYPEP_SWITCH_TYPE_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="23" sourceType="DataField" format="yyyy-mm-dd" name="P_SWITCH_TYPE_ID" source="P_SWITCH_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="74" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="75"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="GENSOFT" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
				<Field id="6" tableName="P_SWITCH_TYPE" fieldName="P_SWITCH_TYPE_ID"/>
				<Field id="24" tableName="P_SWITCH_TYPE" fieldName="CODE"/>
				<Field id="26" tableName="P_SWITCH_TYPE" fieldName="GENSOFT"/>
				<Field id="28" tableName="P_SWITCH_TYPE" fieldName="CUTOFF_M1"/>
				<Field id="30" tableName="P_SWITCH_TYPE" fieldName="CUTOFF_M2"/>
				<Field id="32" tableName="P_SWITCH_TYPE" fieldName="CUTOFF_M3"/>
				<Field id="34" tableName="P_SWITCH_TYPE" fieldName="CUTOFF_M4"/>
				<Field id="36" tableName="P_SWITCH_TYPE" fieldName="DESCRIPTION"/>
				<Field id="38" tableName="P_SWITCH_TYPE" fieldName="CREATION_DATE"/>
				<Field id="40" tableName="P_SWITCH_TYPE" fieldName="CREATED_BY"/>
				<Field id="42" tableName="P_SWITCH_TYPE" fieldName="UPDATED_DATE"/>
				<Field id="44" tableName="P_SWITCH_TYPE" fieldName="UPDATED_BY"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_SWITCH_TYPESearch" wizardCaption=" P SWITCH TYPE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_switch_type.ccp" PathID="P_SWITCH_TYPESearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_SWITCH_TYPESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_SWITCH_TYPESearchButton_DoSearch">
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
		<Record id="47" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_switch_type1" dataSource="p_switch_type" errorSummator="Error" wizardCaption=" P Switch Type " wizardFormMethod="post" PathID="p_switch_type1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_SWITCH_TYPE(P_SWITCH_TYPE_ID,CODE,GENSOFT,CUTOFF_M1,CUTOFF_M2,CUTOFF_M3,CUTOFF_M4,DESCRIPTION,CREATION_DATE,CREATED_BY,UPDATED_DATE,UPDATED_BY) 
VALUES
(GENERATE_ID('TRB','P_SWITCH_TYPE','P_SWITCH_TYPE_ID'),UPPER(TRIM('{CODE}')),UPPER(TRIM('{GENSOFT}')),{CUTOFF_M1},{CUTOFF_M2},{CUTOFF_M3},{CUTOFF_M4},'{DESCRIPTION}',sysdate,'{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_SWITCH_TYPE SET 
CODE=UPPER(TRIM('{CODE}')),
GENSOFT=UPPER(TRIM('{GENSOFT}')),
CUTOFF_M1={CUTOFF_M1},
CUTOFF_M2={CUTOFF_M2},
CUTOFF_M3={CUTOFF_M3},
CUTOFF_M4={CUTOFF_M4},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_SWITCH_TYPE_ID = {P_SWITCH_TYPE_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_SWITCH_TYPE WHERE P_SWITCH_TYPE_ID = {P_SWITCH_TYPE_ID}">
			<Components>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GENSOFT" fieldSource="GENSOFT" required="False" caption="GENSOFT" wizardCaption="GENSOFT" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1GENSOFT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUTOFF_M1" fieldSource="CUTOFF_M1" required="False" caption="CUTOFF M1" wizardCaption="CUTOFF M1" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1CUTOFF_M1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUTOFF_M2" fieldSource="CUTOFF_M2" required="False" caption="CUTOFF M2" wizardCaption="CUTOFF M2" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1CUTOFF_M2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUTOFF_M3" fieldSource="CUTOFF_M3" required="False" caption="CUTOFF M3" wizardCaption="CUTOFF M3" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1CUTOFF_M3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUTOFF_M4" fieldSource="CUTOFF_M4" required="False" caption="CUTOFF M4" wizardCaption="CUTOFF M4" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1CUTOFF_M4">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1DESCRIPTION">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<Button id="67" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_switch_type1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="68" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_switch_type1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="69" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_switch_type1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="70"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="71" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_switch_type1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SWITCH_TYPE_ID" fieldSource="P_SWITCH_TYPE_ID" required="False" caption="P_SWITCH_TYPE_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_switch_type1P_SWITCH_TYPE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="53" conditionType="Parameter" useIsNull="False" field="P_SWITCH_TYPE_ID" parameterSource="P_SWITCH_TYPE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="89" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="90" variable="GENSOFT" parameterType="Control" dataType="Text" parameterSource="GENSOFT"/>
<SQLParameter id="91" variable="CUTOFF_M1" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUTOFF_M1"/>
<SQLParameter id="92" variable="CUTOFF_M2" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUTOFF_M2"/>
<SQLParameter id="93" variable="CUTOFF_M3" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUTOFF_M3"/>
<SQLParameter id="94" variable="CUTOFF_M4" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUTOFF_M4"/>
<SQLParameter id="95" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="96" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="97" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
			<IFormElements>
<CustomParameter id="78" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="79" field="GENSOFT" dataType="Text" parameterType="Control" parameterSource="GENSOFT"/>
<CustomParameter id="80" field="CUTOFF_M1" dataType="Float" parameterType="Control" parameterSource="CUTOFF_M1"/>
<CustomParameter id="81" field="CUTOFF_M2" dataType="Float" parameterType="Control" parameterSource="CUTOFF_M2"/>
<CustomParameter id="82" field="CUTOFF_M3" dataType="Float" parameterType="Control" parameterSource="CUTOFF_M3"/>
<CustomParameter id="83" field="CUTOFF_M4" dataType="Float" parameterType="Control" parameterSource="CUTOFF_M4"/>
<CustomParameter id="84" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="85" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="86" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="87" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
<CustomParameter id="88" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="112" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="113" variable="GENSOFT" parameterType="Control" dataType="Text" parameterSource="GENSOFT"/>
<SQLParameter id="114" variable="CUTOFF_M1" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUTOFF_M1"/>
<SQLParameter id="115" variable="CUTOFF_M2" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUTOFF_M2"/>
<SQLParameter id="116" variable="CUTOFF_M3" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUTOFF_M3"/>
<SQLParameter id="117" variable="CUTOFF_M4" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUTOFF_M4"/>
<SQLParameter id="118" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="119" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="120" variable="P_SWITCH_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SWITCH_TYPE_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="100" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="101" field="GENSOFT" dataType="Text" parameterType="Control" parameterSource="GENSOFT"/>
<CustomParameter id="102" field="CUTOFF_M1" dataType="Float" parameterType="Control" parameterSource="CUTOFF_M1"/>
<CustomParameter id="103" field="CUTOFF_M2" dataType="Float" parameterType="Control" parameterSource="CUTOFF_M2"/>
<CustomParameter id="104" field="CUTOFF_M3" dataType="Float" parameterType="Control" parameterSource="CUTOFF_M3"/>
<CustomParameter id="105" field="CUTOFF_M4" dataType="Float" parameterType="Control" parameterSource="CUTOFF_M4"/>
<CustomParameter id="106" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="107" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="108" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="109" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="110" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="111" field="P_SWITCH_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_SWITCH_TYPE_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="121" variable="P_SWITCH_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SWITCH_TYPE_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_switch_type.php" forShow="True" url="p_switch_type.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_switch_type_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="76"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="77"/>
</Actions>
</Event>
</Events>
</Page>
