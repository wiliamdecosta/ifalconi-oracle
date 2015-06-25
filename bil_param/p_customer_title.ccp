<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as p_title_position_name,c.code as p_customer_segment_name from p_customer_title a , p_title_position b , p_customer_segment c
where a.p_title_position_id=b.p_title_position_id and a.p_customer_segment_id=c.p_customer_segment_id
and upper(a.code) like upper('%{s_keyword}%')
ORDER BY A.p_customer_title_ID desc" name="P_CUSTOMER_TITLE" orderBy="P_CUSTOMER_TITLE_ID" pageSizeLimit="100" wizardCaption=" P CUSTOMER TITLE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CUSTOMER_TITLECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_TITLE_POSITION_NAME" fieldSource="P_TITLE_POSITION_NAME" wizardCaption="P TITLE POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_CUSTOMER_TITLEP_TITLE_POSITION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_CUSTOMER_SEGMENT_NAME" fieldSource="P_CUSTOMER_SEGMENT_NAME" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_CUSTOMER_TITLEP_CUSTOMER_SEGMENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CUSTOMER_TITLEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="36" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CUSTOMER_TITLE_Insert" hrefSource="p_customer_title.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_CUSTOMER_TITLEP_CUSTOMER_TITLE_Insert" removeParameters="P_CUSTOMER_TITLE_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="61"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="52" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="66" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_CUSTOMER_TITLEDLink" hrefSource="p_customer_title.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_CUSTOMER_TITLE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="67" sourceType="DataField" name="P_CUSTOMER_TITLE_ID" source="P_CUSTOMER_TITLE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="68" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_CUSTOMER_TITLEADLink" hrefSource="p_customer_title.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_CUSTOMER_TITLE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="69" sourceType="DataField" format="yyyy-mm-dd" name="P_CUSTOMER_TITLE_ID" source="P_CUSTOMER_TITLE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CUSTOMER_TITLE_ID" fieldSource="P_CUSTOMER_TITLE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_customer_title.ccp" wizardThemeItem="GridA" PathID="P_CUSTOMER_TITLEP_CUSTOMER_TITLE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="19" sourceType="DataField" format="yyyy-mm-dd" name="P_CUSTOMER_TITLE_ID" source="P_CUSTOMER_TITLE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="62" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="63"/>
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
				<SQLParameter id="54" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_CUSTOMER_TITLESearch" wizardCaption=" P CUSTOMER TITLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_customer_title.ccp" PathID="P_CUSTOMER_TITLESearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_CUSTOMER_TITLESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_CUSTOMER_TITLESearchButton_DoSearch">
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
		<Record id="37" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_customer_title1" dataSource="select a.*,b.code as p_title_position_name,c.code as p_customer_segment_name from p_customer_title a , p_title_position b , p_customer_segment c
where a.p_title_position_id=b.p_title_position_id and a.p_customer_segment_id=c.p_customer_segment_id
and a.P_CUSTOMER_TITLE_ID={P_CUSTOMER_TITLE_ID}" errorSummator="Error" wizardCaption=" P Customer Title " wizardFormMethod="post" PathID="p_customer_title1" activeCollection="USQLParameters" parameterTypeListName="ParameterTypeList" customInsertType="SQL" customInsert="INSERT INTO P_CUSTOMER_TITLE(P_CUSTOMER_TITLE_ID, CODE, P_TITLE_POSITION_ID, P_CUSTOMER_SEGMENT_ID, DESCRIPTION, UPDATE_DATE, UPDATE_BY) 
VALUES
(GENERATE_ID('BILLDB','P_CUSTOMER_TITLE','P_CUSTOMER_TITLE_ID'),UPPER(TRIM('{CODE}')),{P_TITLE_POSITION_ID},{P_CUSTOMER_SEGMENT_ID},'{DESCRIPTION}',sysdate,'{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_CUSTOMER_TITLE SET 
	CODE=UPPER(TRIM('{CODE}')),
	P_TITLE_POSITION_ID={P_TITLE_POSITION_ID},
	P_CUSTOMER_SEGMENT_ID={P_CUSTOMER_SEGMENT_ID},
	DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')), 
	UPDATE_DATE=sysdate, 
	UPDATE_BY='{UPDATE_BY}' 
	WHERE  P_CUSTOMER_TITLE_ID = {P_CUSTOMER_TITLE_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_CUSTOMER_TITLE WHERE P_CUSTOMER_TITLE_ID = {P_CUSTOMER_TITLE_ID}" pasteActions="pasteActions">
			<Components>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_TITLE_POSITION_ID" fieldSource="P_TITLE_POSITION_ID" required="True" caption="P TITLE POSITION ID" wizardCaption="P TITLE POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1P_TITLE_POSITION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CUSTOMER_SEGMENT_ID" fieldSource="P_CUSTOMER_SEGMENT_ID" required="True" caption="P CUSTOMER SEGMENT ID" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1P_CUSTOMER_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextArea id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_customer_title1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_customer_title1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_customer_title1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="59"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="60" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_customer_title1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="95" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CUSTOMER_TITLE_ID" fieldSource="P_CUSTOMER_TITLE_ID" required="False" caption="P_CUSTOMER_TITLE_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1P_CUSTOMER_TITLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_TITLE_POSITION_NAME" fieldSource="P_TITLE_POSITION_NAME" required="True" caption="P TITLE POSITION ID" wizardCaption="P TITLE POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1P_TITLE_POSITION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="103" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CUSTOMER_SEGMENT_NAME" fieldSource="P_CUSTOMER_SEGMENT_NAME" required="True" caption="P CUSTOMER SEGMENT ID" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_title1P_CUSTOMER_SEGMENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="43" conditionType="Parameter" useIsNull="False" field="P_CUSTOMER_TITLE_ID" parameterSource="P_CUSTOMER_TITLE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="55" parameterType="URL" variable="P_CUSTOMER_TITLE_ID" dataType="Float" parameterSource="P_CUSTOMER_TITLE_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="78" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="79" variable="P_TITLE_POSITION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TITLE_POSITION_ID"/>
				<SQLParameter id="80" variable="P_CUSTOMER_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<SQLParameter id="81" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="83" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="70" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="71" field="P_TITLE_POSITION_ID" dataType="Float" parameterType="Control" parameterSource="P_TITLE_POSITION_ID"/>
				<CustomParameter id="72" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<CustomParameter id="73" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="74" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="75" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="76" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="77" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="92" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="94" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="96" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
				<SQLParameter id="98" variable="P_CUSTOMER_TITLE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CUSTOMER_TITLE_ID"/>
				<SQLParameter id="99" variable="P_TITLE_POSITION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TITLE_POSITION_ID"/>
				<SQLParameter id="100" variable="P_CUSTOMER_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="84" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="85" field="P_TITLE_POSITION_ID" dataType="Float" parameterType="Control" parameterSource="P_TITLE_POSITION_ID"/>
				<CustomParameter id="86" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<CustomParameter id="87" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="88" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="89" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="90" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="91" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="101" variable="P_CUSTOMER_TITLE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CUSTOMER_TITLE_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_customer_title.php" forShow="True" url="p_customer_title.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_customer_title_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="64"/>
				<Action actionName="Custom Code" actionCategory="General" id="65"/>
			</Actions>
		</Event>
	</Events>
</Page>
