<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" dataSource="SELECT A.*,B.CODE AS FINANCE_NAME,C.CODE AS YEAR_NAME FROM P_FINANCE_PERIOD A , BLUP.P_PERIOD_STATUS B , P_YEAR_PERIOD C 
WHERE A.PERIOD_STATUS_ID = B.P_PERIOD_STATUS_ID
AND A.P_YEAR_PERIOD_ID = C.P_YEAR_PERIOD_ID
AND UPPER(FINANCE_PERIOD_CODE) LIKE UPPER('%{s_keyword}%')" name="P_FINANCE_PERIOD" orderBy="P_FINANCE_PERIOD_ID" pageSizeLimit="100" wizardCaption=" P FINANCE PERIOD " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
			<Components>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="FINANCE_PERIOD_CODE" fieldSource="FINANCE_PERIOD_CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FINANCE_PERIODFINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="FINANCE_NAME" fieldSource="FINANCE_NAME" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_FINANCE_PERIODFINANCE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="YEAR_NAME" fieldSource="YEAR_NAME" wizardCaption="P YEAR PERIOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_FINANCE_PERIODYEAR_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="SKUM_NO" fieldSource="SKUM_NO" wizardCaption="SKUM NO" wizardSize="48" wizardMaxLength="48" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FINANCE_PERIODSKUM_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="24" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="61"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="53" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_FINANCE_PERIODDLink" hrefSource="p_finance_period.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="54" sourceType="DataField" name="P_FINANCE_PERIOD_ID" source="P_FINANCE_PERIOD_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FINANCE_PERIOD_Insert" PathID="P_FINANCE_PERIODP_FINANCE_PERIOD_Insert" hrefSource="p_finance_period.ccp" wizardUseTemplateBlock="False" removeParameters="P_FINANCE_PERIOD_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="56"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="57" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FINANCE_PERIOD_ID" fieldSource="P_FINANCE_PERIOD_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_finance_period.ccp" wizardThemeItem="GridA" PathID="P_FINANCE_PERIODP_FINANCE_PERIOD_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_FINANCE_PERIOD_ID" source="P_FINANCE_PERIOD_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="59"/>
						<Action actionName="Set Row Style" actionCategory="General" id="60" styles="Row;AltRow"/>
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
				<SQLParameter id="58" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_FINANCE_PERIODSearch" wizardCaption=" P FINANCE PERIOD " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_finance_period.ccp" PathID="P_FINANCE_PERIODSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_FINANCE_PERIODSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="52" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_FINANCE_PERIODSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
		<Record id="25" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_FINANCE_PERIOD1" dataSource="SELECT A.*,B.CODE AS FINANCE_NAME,C.CODE AS YEAR_NAME FROM P_FINANCE_PERIOD A , BLUP.P_PERIOD_STATUS B , P_YEAR_PERIOD C 
WHERE A.PERIOD_STATUS_ID = B.P_PERIOD_STATUS_ID
AND A.P_YEAR_PERIOD_ID = C.P_YEAR_PERIOD_ID
AND a.P_FINANCE_PERIOD_ID = {P_FINANCE_PERIOD_ID}" errorSummator="Error" wizardCaption=" P FINANCE PERIOD " wizardFormMethod="post" PathID="P_FINANCE_PERIOD1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_FINANCE_PERIOD
(P_FINANCE_PERIOD_ID, FINANCE_PERIOD_CODE, START_DATE, END_DATE, PERIOD_STATUS_ID, P_YEAR_PERIOD_ID, SKUM_NO, SKUM_DATE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES
(GENERATE_ID('BILLDB','P_FINANCE_PERIOD','P_FINANCE_PERIOD_ID'),UPPER('{FINANCE_PERIOD_CODE}'),TO_DATE('{START_DATE}','YYYY-MM-DD HH24:MI:SS'),TO_DATE('{END_DATE}','YYYY-MM-DD HH24:MI:SS'),{PERIOD_STATUS_ID},{P_YEAR_PERIOD_ID},'{SKUM_NO}',TO_DATE('{SKUM_DATE}','YYYY-MM-DD HH24:MI:SS'),'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_FINANCE_PERIOD
SET FINANCE_PERIOD_CODE = UPPER('{FINANCE_PERIOD_CODE}'),
END_DATE = TO_DATE('{END_DATE}','YYYY-MM-DD HH24:MI:SS'),
SKUM_NO = '{SKUM_NO}',
PERIOD_STATUS_ID = {PERIOD_STATUS_ID},
P_YEAR_PERIOD_ID = {P_YEAR_PERIOD_ID},
START_DATE = TO_DATE('{START_DATE}','YYYY-MM-DD HH24:MI:SS'),
SKUM_DATE = TO_DATE('{SKUM_DATE}','YYYY-MM-DD HH24:MI:SS')
WHERE P_FINANCE_PERIOD_ID = {P_FINANCE_PERIOD_ID}" customDeleteType="SQL" customDelete="DELETE P_FINANCE_PERIOD
WHERE P_FINANCE_PERIOD_ID = {P_FINANCE_PERIOD_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
			<Components>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FINANCE_PERIOD_CODE" fieldSource="FINANCE_PERIOD_CODE" required="True" caption="FINANCE PERIOD CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1FINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="START_DATE" fieldSource="START_DATE" required="True" caption="START DATE" wizardCaption="START DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1START_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="34" name="DatePicker_START_DATE" control="START_DATE" wizardSatellite="True" wizardControl="START_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FINANCE_PERIOD1DatePicker_START_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PERIOD_STATUS_ID" fieldSource="PERIOD_STATUS_ID" required="True" caption="PERIOD STATUS ID" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1PERIOD_STATUS_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_YEAR_PERIOD_ID" fieldSource="P_YEAR_PERIOD_ID" required="True" caption="P YEAR PERIOD ID" wizardCaption="P YEAR PERIOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1P_YEAR_PERIOD_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="SKUM_DATE" fieldSource="SKUM_DATE" required="False" caption="SKUM DATE" wizardCaption="SKUM DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1SKUM_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="41" name="DatePicker_SKUM_DATE" control="SKUM_DATE" wizardSatellite="True" wizardControl="SKUM_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FINANCE_PERIOD1DatePicker_SKUM_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1UPDATE_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="44" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FINANCE_PERIOD1DatePicker_UPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="END_DATE" fieldSource="END_DATE" required="True" caption="END DATE" wizardCaption="END DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1END_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="36" name="DatePicker_END_DATE" control="END_DATE" wizardSatellite="True" wizardControl="END_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_FINANCE_PERIOD1DatePicker_END_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="46" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_FINANCE_PERIOD1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="47" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_FINANCE_PERIOD1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="48" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_FINANCE_PERIOD1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="49" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_FINANCE_PERIOD1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FINANCE_PERIOD_ID" fieldSource="P_FINANCE_PERIOD_ID" required="False" caption="FINANCE PERIOD CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1P_FINANCE_PERIOD_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SKUM_NO" fieldSource="SKUM_NO" required="True" caption="P YEAR PERIOD ID" wizardCaption="P YEAR PERIOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1SKUM_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PERIOD_STATUS_NAME" fieldSource="FINANCE_NAME" required="False" caption="PERIOD STATUS ID" wizardCaption="PERIOD STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1PERIOD_STATUS_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_YEAR_PERIOD_NAME" fieldSource="YEAR_NAME" required="False" caption="P YEAR PERIOD ID" wizardCaption="P YEAR PERIOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FINANCE_PERIOD1P_YEAR_PERIOD_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_FINANCE_PERIOD_ID" parameterSource="P_FINANCE_PERIOD_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="106" parameterType="URL" variable="P_FINANCE_PERIOD_ID" dataType="Float" parameterSource="P_FINANCE_PERIOD_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="74" variable="FINANCE_PERIOD_CODE" parameterType="Control" dataType="Text" parameterSource="FINANCE_PERIOD_CODE"/>
				<SQLParameter id="75" variable="START_DATE" parameterType="Control" dataType="Date" parameterSource="START_DATE" defaultValue="SYSDATE"/>
				<SQLParameter id="76" variable="END_DATE" parameterType="Control" dataType="Date" parameterSource="END_DATE" defaultValue="SYSDATE"/>
				<SQLParameter id="77" variable="PERIOD_STATUS_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PERIOD_STATUS_ID"/>
				<SQLParameter id="78" variable="P_YEAR_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_YEAR_PERIOD_ID"/>
				<SQLParameter id="79" variable="SKUM_NO" parameterType="Control" dataType="Text" parameterSource="SKUM_NO"/>
				<SQLParameter id="80" variable="SKUM_DATE" parameterType="Control" dataType="Date" parameterSource="SKUM_DATE" defaultValue="SYSDATE"/>
				<SQLParameter id="81" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="82" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="64" field="FINANCE_PERIOD_CODE" dataType="Text" parameterType="Control" parameterSource="FINANCE_PERIOD_CODE"/>
				<CustomParameter id="65" field="START_DATE" dataType="Date" parameterType="Control" parameterSource="START_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="66" field="PERIOD_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="PERIOD_STATUS_ID"/>
				<CustomParameter id="67" field="P_YEAR_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_YEAR_PERIOD_ID"/>
				<CustomParameter id="68" field="SKUM_DATE" dataType="Date" parameterType="Control" parameterSource="SKUM_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="69" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="70" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="71" field="END_DATE" dataType="Date" parameterType="Control" parameterSource="END_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="72" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="73" field="P_FINANCE_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_FINANCE_PERIOD_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="96" variable="P_FINANCE_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FINANCE_PERIOD_ID"/>
				<SQLParameter id="97" variable="FINANCE_PERIOD_CODE" parameterType="Control" dataType="Text" parameterSource="FINANCE_PERIOD_CODE"/>
				<SQLParameter id="98" variable="END_DATE" parameterType="Control" defaultValue="SYSDATE" dataType="Date" parameterSource="END_DATE"/>
<SQLParameter id="99" variable="SKUM_NO" parameterType="Control" dataType="Text" parameterSource="SKUM_NO"/>
<SQLParameter id="100" variable="PERIOD_STATUS_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PERIOD_STATUS_ID"/>
<SQLParameter id="101" variable="P_YEAR_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_YEAR_PERIOD_ID"/>
<SQLParameter id="102" variable="START_DATE" parameterType="Control" defaultValue="SYSDATE" dataType="Date" parameterSource="START_DATE"/>
<SQLParameter id="103" variable="SKUM_DATE" parameterType="Control" defaultValue="SYSDATE" dataType="Date" parameterSource="SKUM_DATE"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="85" field="FINANCE_PERIOD_CODE" dataType="Text" parameterType="Control" parameterSource="FINANCE_PERIOD_CODE"/>
				<CustomParameter id="86" field="START_DATE" dataType="Date" parameterType="Control" parameterSource="START_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="87" field="PERIOD_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="PERIOD_STATUS_ID"/>
				<CustomParameter id="88" field="P_YEAR_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_YEAR_PERIOD_ID"/>
				<CustomParameter id="89" field="SKUM_DATE" dataType="Date" parameterType="Control" parameterSource="SKUM_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="90" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="91" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="92" field="END_DATE" dataType="Date" parameterType="Control" parameterSource="END_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="93" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="94" field="P_FINANCE_PERIOD_ID" dataType="Float" parameterType="Control" parameterSource="P_FINANCE_PERIOD_ID"/>
				<CustomParameter id="95" field="SKUM_NO" dataType="Text" parameterType="Control" parameterSource="SKUM_NO"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="107" variable="P_FINANCE_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FINANCE_PERIOD_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_finance_period.php" forShow="True" url="p_finance_period.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_finance_period_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
