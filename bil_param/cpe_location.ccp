<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT A.*,B.CODE AS P_CPE_LOCATION_NAME,
C.REGION_NAME AS REGION_NAME,
D.CODE AS COMPANY_NAME FROM CPE_LOCATION A , P_CPE_LOCATION_TYPE B , P_REGION C,P_COMPANY D
WHERE A.P_CPE_LOCATION_TYPE_ID = B.P_CPE_LOCATION_TYPE_ID
AND A.P_REGION_ID = C.P_REGION_ID
AND A.P_COMPANY_ID = D.P_COMPANY_ID
AND UPPER(A.CODE) LIKE UPPER('%{s_keyword}%')" name="CPE_LOCATION" orderBy="CPE_LOCATION_ID" pageSizeLimit="100" wizardCaption=" CPE LOCATION " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CPE_LOCATIONCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_CPE_LOCATION_NAME" fieldSource="P_CPE_LOCATION_NAME" wizardCaption="P CPE LOCATION TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="CPE_LOCATIONP_CPE_LOCATION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="REGION_NAME" fieldSource="REGION_NAME" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="CPE_LOCATIONREGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="COMPANY_NAME" fieldSource="COMPANY_NAME" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="CPE_LOCATIONCOMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Float" html="False" name="ZIP_CODE" fieldSource="ZIP_CODE" wizardCaption="ZIP CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="CPE_LOCATIONZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CPE_LOCATIONDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="30" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="88"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_APPL_Insert" PathID="CPE_LOCATIONP_APPL_Insert" hrefSource="cpe_location.ccp" wizardUseTemplateBlock="False" removeParameters="CPE_LOCATION_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="53"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="54" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="CPE_LOCATION_ID" fieldSource="CPE_LOCATION_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="cpe_location.ccp" wizardThemeItem="GridA" PathID="CPE_LOCATIONCPE_LOCATION_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="CPE_LOCATION_ID" source="CPE_LOCATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
<Link id="60" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="CPE_LOCATIONDLink" hrefSource="cpe_location.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="61" sourceType="DataField" name="CPE_LOCATION_ID" source="CPE_LOCATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="89"/>
<Action actionName="Set Row Style" actionCategory="General" id="90" styles="Row;AltRow"/>
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
<SQLParameter id="120" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="CPE_LOCATIONSearch" wizardCaption=" CPE LOCATION " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="cpe_location.ccp" PathID="CPE_LOCATIONSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="CPE_LOCATIONSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="51" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="CPE_LOCATIONSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
		<Record id="31" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="CPE_LOCATION1" dataSource="SELECT A.*,B.CODE AS P_CPE_LOCATION_NAME,
C.REGION_NAME AS REGION_NAME,
D.CODE AS COMPANY_NAME FROM CPE_LOCATION A , P_CPE_LOCATION_TYPE B , P_REGION C,P_COMPANY D
WHERE A.P_CPE_LOCATION_TYPE_ID = B.P_CPE_LOCATION_TYPE_ID
AND A.P_REGION_ID = C.P_REGION_ID
AND A.P_COMPANY_ID = D.P_COMPANY_ID
AND A.CPE_LOCATION_ID = {CPE_LOCATION_ID}" errorSummator="Error" wizardCaption=" CPE LOCATION " wizardFormMethod="post" PathID="CPE_LOCATION1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO CPE_LOCATION (CPE_LOCATION_ID, CODE, P_CPE_LOCATION_TYPE_ID, ADDRESS_1, ADDRESS_2, ADDRESS_3, P_REGION_ID, P_COMPANY_ID, ZIP_CODE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)VALUES
(GENERATE_ID('BILLDB','CPE_LOCATION','CPE_LOCATION_ID'),UPPER('{CODE}'),{P_CPE_LOCATION_TYPE_ID},'{ADDRESS_1}','{ADDRESS_2}','{ADDRESS_3}',{P_REGION_ID},{P_COMPANY_ID},{ZIP_CODE},'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE CPE_LOCATION SET
CODE = UPPER('{CODE}'),
P_CPE_LOCATION_TYPE_ID = {P_CPE_LOCATION_TYPE_ID},
P_REGION_ID = {P_REGION_ID},
P_COMPANY_ID = {P_COMPANY_ID},
ADDRESS_1 = '{ADDRESS_1}',
ADDRESS_2 = '{ADDRESS_2}',
ADDRESS_3 = '{ADDRESS_3}',
ZIP_CODE = {ZIP_CODE},
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE CPE_LOCATION_ID = {CPE_LOCATION_ID}" customDeleteType="SQL" customDelete="DELETE CPE_LOCATION WHERE CPE_LOCATION_ID = {CPE_LOCATION_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
			<Components>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_1" fieldSource="ADDRESS_1" required="True" caption="ADDRESS 1" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1ADDRESS_1">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<TextArea id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_2" fieldSource="ADDRESS_2" required="False" caption="ADDRESS 2" wizardCaption="ADDRESS 2" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1ADDRESS_2">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<TextArea id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_3" fieldSource="ADDRESS_3" required="False" caption="ADDRESS 3" wizardCaption="ADDRESS 3" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1ADDRESS_3">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<Hidden id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_ID" fieldSource="P_REGION_ID" required="True" caption="P REGION ID" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1P_REGION_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COMPANY_ID" fieldSource="P_COMPANY_ID" required="False" caption="P COMPANY ID" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1P_COMPANY_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ZIP_CODE" fieldSource="ZIP_CODE" required="False" caption="ZIP CODE" wizardCaption="ZIP CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1ZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1DESCRIPTION">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="48" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="CPE_LOCATION1DatePicker_UPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CPE_LOCATION_ID" fieldSource="CPE_LOCATION_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1CPE_LOCATION_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="55" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="CPE_LOCATION1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="56" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="CPE_LOCATION1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="CPE_LOCATION1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="58" eventType="Client" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="59" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="CPE_LOCATION1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CPE_LOCATION_TYPE_ID" fieldSource="P_CPE_LOCATION_TYPE_ID" required="True" caption="P CPE LOCATION TYPE ID" wizardCaption="P CPE LOCATION TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1P_CPE_LOCATION_TYPE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LOC_NAME" fieldSource="P_CPE_LOCATION_NAME" required="False" caption="P CPE LOCATION TYPE ID" wizardCaption="P CPE LOCATION TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1LOC_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_REGION_NAME" fieldSource="REGION_NAME" required="False" caption="P REGION ID" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1P_REGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COMPANY_NAME" fieldSource="COMPANY_NAME" required="False" caption="P COMPANY ID" wizardCaption="P COMPANY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CPE_LOCATION1P_COMPANY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="CPE_LOCATION_ID" parameterSource="CPE_LOCATION_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="121" parameterType="URL" variable="CPE_LOCATION_ID" dataType="Float" parameterSource="CPE_LOCATION_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="75" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="76" variable="P_CPE_LOCATION_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CPE_LOCATION_TYPE_ID"/>
				<SQLParameter id="77" variable="ADDRESS_1" parameterType="Control" dataType="Text" parameterSource="ADDRESS_1"/>
				<SQLParameter id="78" variable="ADDRESS_2" parameterType="Control" dataType="Text" parameterSource="ADDRESS_2"/>
				<SQLParameter id="79" variable="ADDRESS_3" parameterType="Control" dataType="Text" parameterSource="ADDRESS_3"/>
				<SQLParameter id="80" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
				<SQLParameter id="81" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
				<SQLParameter id="82" variable="ZIP_CODE" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ZIP_CODE"/>
				<SQLParameter id="83" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="84" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="63" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="64" field="P_CPE_LOCATION_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_CPE_LOCATION_TYPE_ID"/>
				<CustomParameter id="65" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
				<CustomParameter id="66" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
				<CustomParameter id="67" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
				<CustomParameter id="68" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
				<CustomParameter id="69" field="P_COMPANY_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_ID"/>
				<CustomParameter id="70" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
				<CustomParameter id="71" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="72" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="73" field="CPE_LOCATION_ID" dataType="Text" parameterType="Control" parameterSource="CPE_LOCATION_ID"/>
				<CustomParameter id="74" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="108" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="109" variable="P_CPE_LOCATION_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CPE_LOCATION_TYPE_ID"/>
<SQLParameter id="110" variable="CPE_LOCATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CPE_LOCATION_ID"/>
<SQLParameter id="111" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
<SQLParameter id="112" variable="P_COMPANY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COMPANY_ID"/>
<SQLParameter id="113" variable="ADDRESS_1" parameterType="Control" dataType="Text" parameterSource="ADDRESS_1"/>
<SQLParameter id="114" variable="ADDRESS_2" parameterType="Control" dataType="Text" parameterSource="ADDRESS_2"/>
<SQLParameter id="115" variable="ADDRESS_3" parameterType="Control" dataType="Text" parameterSource="ADDRESS_3"/>
<SQLParameter id="116" variable="ZIP_CODE" parameterType="Control" dataType="Text" parameterSource="ZIP_CODE"/>
<SQLParameter id="117" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="118" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="93" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="94" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
<CustomParameter id="95" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
<CustomParameter id="96" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
<CustomParameter id="97" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
<CustomParameter id="98" field="P_COMPANY_ID" dataType="Float" parameterType="Control" parameterSource="P_COMPANY_ID"/>
<CustomParameter id="99" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
<CustomParameter id="100" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="101" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="102" field="CPE_LOCATION_ID" dataType="Text" parameterType="Control" parameterSource="CPE_LOCATION_ID"/>
<CustomParameter id="103" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="104" field="P_CPE_LOCATION_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_CPE_LOCATION_TYPE_ID"/>
<CustomParameter id="105" field="P_CPE_LOCATION_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="LOC_NAME"/>
<CustomParameter id="106" field="P_REGION_ID" dataType="Text" parameterType="Control" parameterSource="P_REGION_NAME"/>
<CustomParameter id="107" field="P_COMPANY_ID" dataType="Text" parameterType="Control" parameterSource="P_COMPANY_NAME"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="119" variable="CPE_LOCATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CPE_LOCATION_ID"/>
</DSQLParameters>
			<DConditions>
				<TableParameter id="62" conditionType="Parameter" useIsNull="False" field="CPE_LOCATION_ID" dataType="Float" parameterType="URL" parameterSource="CPE_LOCATION_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="cpe_location.php" forShow="True" url="cpe_location.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="cpe_location_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="91"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="92"/>
</Actions>
</Event>
</Events>
</Page>
