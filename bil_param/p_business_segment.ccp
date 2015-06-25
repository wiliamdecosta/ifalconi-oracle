<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,B.CODE as p_customer_segment_name from p_business_segment a , p_customer_segment b where
A.P_CUSTOMER_SEGMENT_ID=B.P_CUSTOMER_SEGMENT_ID and UPPER(a.code) like UPPER('%{s_keyword}%') order by a.P_BUSINESS_SEGMENT_ID desc" name="P_BUSINESS_SEGMENT" orderBy="P_BUSINESS_SEGMENT_ID" pageSizeLimit="100" wizardCaption=" P BUSINESS SEGMENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BUSINESS_SEGMENTCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_CUSTOMER_SEGMENT_NAME" fieldSource="P_CUSTOMER_SEGMENT_NAME" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BUSINESS_SEGMENTP_CUSTOMER_SEGMENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BUSINESS_SEGMENTDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="31" size="6" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BUSINESS_SEGMENT_Insert" hrefSource="p_business_segment.ccp" removeParameters="P_BUSINESS_SEGMENT_ID;FLAG;s_keyword;P_BUSINESS_SEGMENTPage;P_BUSINESS_SEGMENTPageSize;P_BUSINESS_SEGMENTOrder;P_BUSINESS_SEGMENTDir" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_BUSINESS_SEGMENTP_BUSINESS_SEGMENT_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="57"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="44" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BUSINESS_SEGMENTDLink" hrefSource="p_business_segment.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BUSINESS_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="90" sourceType="DataField" name="P_BUSINESS_SEGMENT_ID" source="P_BUSINESS_SEGMENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="91" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_BUSINESS_SEGMENTADLink" hrefSource="p_business_segment.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BUSINESS_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="92" sourceType="DataField" format="yyyy-mm-dd" name="P_BUSINESS_SEGMENT_ID" source="P_BUSINESS_SEGMENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BUSINESS_SEGMENT_ID" fieldSource="P_BUSINESS_SEGMENT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_business_segment.ccp" wizardThemeItem="GridA" PathID="P_BUSINESS_SEGMENTP_BUSINESS_SEGMENT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_BUSINESS_SEGMENT_ID" source="P_BUSINESS_SEGMENT_ID"/>
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
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="95"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="OLD_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="93" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BUSINESS_SEGMENTSearch" wizardCaption=" P BUSINESS SEGMENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_business_segment.ccp" PathID="P_BUSINESS_SEGMENTSearch" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_BUSINESS_SEGMENTSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_BUSINESS_SEGMENTSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
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
		<Record id="32" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_business_segment1" dataSource="select a.*,B.CODE as p_customer_segment_name from p_business_segment a , p_customer_segment b where
A.P_CUSTOMER_SEGMENT_ID=B.P_CUSTOMER_SEGMENT_ID and a.P_BUSINESS_SEGMENT_ID={P_BUSINESS_SEGMENT_ID}
" errorSummator="Error" wizardCaption=" P Business Segment " wizardFormMethod="post" PathID="p_business_segment1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_BUSINESS_SEGMENT (P_BUSINESS_SEGMENT_ID, CODE, P_CUSTOMER_SEGMENT_ID, DESCRIPTION, UPDATE_DATE, UPDATE_BY) 
VALUES
(GENERATE_ID('BILLDB','P_BUSINESS_SEGMENT','P_BUSINESS_SEGMENT_ID'),UPPER(TRIM('{CODE}')),{P_CUSTOMER_SEGMENT_ID},INITCAP(TRIM('{DESCRIPTION}')),sysdate, '{UPDATE_BY}')" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customUpdateType="SQL" customUpdate="UPDATE P_BUSINESS_SEGMENT SET 
CODE=UPPER(TRIM('{CODE}')),
P_CUSTOMER_SEGMENT_ID={P_CUSTOMER_SEGMENT_ID},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_BUSINESS_SEGMENT_ID = {P_BUSINESS_SEGMENT_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_BUSINESS_SEGMENT WHERE P_BUSINESS_SEGMENT_ID = {P_BUSINESS_SEGMENT_ID}">
			<Components>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_business_segment1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CUSTOMER_SEGMENT_ID" fieldSource="P_CUSTOMER_SEGMENT_ID" required="True" caption="P CUSTOMER SEGMENT ID" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_business_segment1P_CUSTOMER_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextArea id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_business_segment1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_business_segment1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_business_segment1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="46" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="p_business_segment1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="47" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="48" message="Anda Yakin Menyimpan Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="49" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_business_segment1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="50" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="51" message="Anda Yakin Mengubah Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="52" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="p_business_segment1Button_Delete" removeParameters="TAMBAH;P_APP_ROLE_ID;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="53" message="Anda Yakin Menghapus Record Ini?" eventType="Client"/>
								<Action actionName="Custom Code" actionCategory="General" id="54" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="55" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="p_business_segment1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="56" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="62" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CUSTOMER_SEGMENT_NAME" fieldSource="P_CUSTOMER_SEGMENT_NAME" required="False" caption="P CUSTOMER SEGMENT ID" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_business_segment1P_CUSTOMER_SEGMENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BUSINESS_SEGMENT_ID" fieldSource="P_BUSINESS_SEGMENT_ID" required="False" caption="P_BUSINESS_SEGMENT_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_business_segment1P_BUSINESS_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="38" conditionType="Parameter" useIsNull="False" field="P_BUSINESS_SEGMENT_ID" parameterSource="P_BUSINESS_SEGMENT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="94" parameterType="URL" variable="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterSource="P_BUSINESS_SEGMENT_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="70" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="72" variable="P_CUSTOMER_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<SQLParameter id="73" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="74" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="63" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="64" field="OLD_CODE" dataType="Text" parameterType="Control" parameterSource="OLD_CODE"/>
				<CustomParameter id="65" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<CustomParameter id="66" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="67" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="68" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="69" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_NAME"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="83" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="85" variable="P_CUSTOMER_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<SQLParameter id="86" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="87" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
				<SQLParameter id="88" variable="P_BUSINESS_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BUSINESS_SEGMENT_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="75" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="76" field="OLD_CODE" dataType="Text" parameterType="Control" parameterSource="OLD_CODE"/>
				<CustomParameter id="77" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<CustomParameter id="78" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="79" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="80" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="81" field="CODE" dataType="Text" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_NAME"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="89" variable="P_BUSINESS_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BUSINESS_SEGMENT_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_business_segment_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_business_segment.php" forShow="True" url="p_business_segment.php" comment="//" codePage="windows-1252"/>
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
