<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="P_REVENUE_TYPE_LIST" name="P_REVENUE_TYPE_LIST" orderBy="P_REVENUE_TYPE_LIST_ID desc" pageSizeLimit="100" wizardCaption=" P GLOBAL PARAM " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions" activeCollection="TableParameters">
			<Components>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="REVENUE_CODE" fieldSource="REVENUE_CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REVENUE_TYPE_LISTREVENUE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="IS RANGE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REVENUE_TYPE_LISTDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="27" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_REVENUE_TYPE_LIST_Insert" hrefSource="p_revenue_type_list.ccp" removeParameters="P_REVENUE_TYPE_LIST_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_REVENUE_TYPE_LISTP_REVENUE_TYPE_LIST_Insert">
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
				<Link id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_REVENUE_TYPE_LISTDLink" hrefSource="p_revenue_type_list.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_REVENUE_TYPE_LIST_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="54" sourceType="DataField" name="P_REVENUE_TYPE_LIST_ID" source="P_REVENUE_TYPE_LIST_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="55" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_REVENUE_TYPE_LISTADLink" hrefSource="p_revenue_type_list.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_REVENUE_TYPE_LIST_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="56" sourceType="DataField" format="yyyy-mm-dd" name="P_REVENUE_TYPE_LIST_ID" source="P_REVENUE_TYPE_LIST_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="101" fieldSourceType="DBColumn" dataType="Text" name="P_REVENUE_TYPE_LIST_ID" PathID="P_REVENUE_TYPE_LISTP_REVENUE_TYPE_LIST_ID" fieldSource="P_REVENUE_TYPE_LIST_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="57" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="58"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="REVENUE_CODE" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1" parameterSource="s_keyword"/>
				<TableParameter id="105" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="103" tableName="P_REVENUE_TYPE_LIST" posLeft="10" posTop="10" posWidth="160" posHeight="136"/>
</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="99" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_REVENUE_TYPE_LISTSearch" wizardCaption=" P GLOBAL PARAM " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_revenue_type_list.ccp" PathID="P_REVENUE_TYPE_LISTSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_REVENUE_TYPE_LISTSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_REVENUE_TYPE_LISTSearchButton_DoSearch">
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
		<Record id="28" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_REVENUE_TYPE_LIST1" dataSource="P_REVENUE_TYPE_LIST" errorSummator="Error" wizardCaption=" P Global Param " wizardFormMethod="post" PathID="P_REVENUE_TYPE_LIST1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_REVENUE_TYPE_LIST(P_REVENUE_TYPE_LIST_ID, REVENUE_CODE, DESCRIPTION, UPDATE_DATE, UPDATE_BY) 
VALUES
(GENERATE_ID('BILLDB','P_REVENUE_TYPE_LIST','P_REVENUE_TYPE_LIST_ID'), '{REVENUE_CODE}', '{DESCRIPTION}', sysdate, '{UPDATE_BY}') " customUpdateType="SQL" customUpdate="UPDATE P_REVENUE_TYPE_LIST SET 
REVENUE_CODE='{REVENUE_CODE}',
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}' 
WHERE  P_REVENUE_TYPE_LIST_ID = {P_REVENUE_TYPE_LIST_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_REVENUE_TYPE_LIST WHERE P_REVENUE_TYPE_LIST_ID = {P_REVENUE_TYPE_LIST_ID}">
			<Components>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REVENUE_CODE" fieldSource="REVENUE_CODE" required="True" caption="REVENUE_CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REVENUE_TYPE_LIST1REVENUE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REVENUE_TYPE_LIST1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REVENUE_TYPE_LIST1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="47" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="P_REVENUE_TYPE_LIST1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="48" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_REVENUE_TYPE_LIST1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="49" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="P_REVENUE_TYPE_LIST1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="50" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="51" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_REVENUE_TYPE_LIST1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REVENUE_TYPE_LIST1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="96" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_REVENUE_TYPE_LIST_ID" fieldSource="P_REVENUE_TYPE_LIST_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REVENUE_TYPE_LIST1P_REVENUE_TYPE_LIST_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="P_REVENUE_TYPE_LIST_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" defaultValue="-99" parameterSource="P_REVENUE_TYPE_LIST_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="100" parameterType="URL" variable="P_REPORT_SEGMENT_ID" dataType="Float" parameterSource="P_REPORT_SEGMENT_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="104" tableName="P_REVENUE_TYPE_LIST" posLeft="10" posTop="10" posWidth="160" posHeight="136"/>
</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="71" variable="REVENUE_CODE" parameterType="Control" dataType="Text" parameterSource="REVENUE_CODE"/>
				<SQLParameter id="76" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="78" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="61" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="62" field="VALUE" dataType="Text" parameterType="Control" parameterSource="VALUE"/>
				<CustomParameter id="63" field="TYPE_1" dataType="Text" parameterType="Control" parameterSource="TYPE_1"/>
				<CustomParameter id="64" field="IS_RANGE" dataType="Text" parameterType="Control" parameterSource="IS_RANGE"/>
				<CustomParameter id="65" field="VALUE_2" dataType="Text" parameterType="Control" parameterSource="VALUE_2"/>
				<CustomParameter id="66" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="67" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="68" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="69" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="70" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="89" variable="REVENUE_CODE" parameterType="Control" dataType="Text" parameterSource="REVENUE_CODE"/>
				<SQLParameter id="94" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="95" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
				<SQLParameter id="97" variable="P_REVENUE_TYPE_LIST_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REVENUE_TYPE_LIST_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="79" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="80" field="VALUE" dataType="Text" parameterType="Control" parameterSource="VALUE"/>
				<CustomParameter id="81" field="TYPE_1" dataType="Text" parameterType="Control" parameterSource="TYPE_1"/>
				<CustomParameter id="82" field="IS_RANGE" dataType="Text" parameterType="Control" parameterSource="IS_RANGE"/>
				<CustomParameter id="83" field="VALUE_2" dataType="Text" parameterType="Control" parameterSource="VALUE_2"/>
				<CustomParameter id="84" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="85" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="86" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="87" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="88" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="98" variable="P_REVENUE_TYPE_LIST_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REVENUE_TYPE_LIST_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_revenue_type_list_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_revenue_type_list.php" forShow="True" url="p_revenue_type_list.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="59"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="60"/>
			</Actions>
		</Event>
	</Events>
</Page>
