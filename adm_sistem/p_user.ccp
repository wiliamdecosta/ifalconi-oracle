<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\adm_sistem" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="sikm" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" connection="Conn" name="P_USERGrid" pageSizeLimit="100" wizardCaption="List of P APP ROLE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="TableParameters" dataSource="SELECT * 
FROM P_USER
WHERE (UPPER(USER_NAME) LIKE UPPER('%{s_keyword}%')
OR UPPER(FULL_NAME) LIKE UPPER('%{s_keyword}%'))
ORDER BY P_USER_ID" orderBy="P_USER_ID">
			<Components>
				<Navigator id="18" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="50"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="52" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_USERGridDLink" hrefSource="p_user.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="124" sourceType="DataField" name="P_USER_ID" source="P_USER_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_USER_Insert" hrefSource="p_user.ccp" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_USERGridP_USER_Insert" removeParameters="P_USER_ID;FLAG;">
					<Components/>
					<Events>
					</Events>
					<LinkParameters>
						<LinkParameter id="215" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="False" name="EMAIL_ADDRESS" fieldSource="EMAIL_ADDRESS" wizardCaption="EMAIL ADDRESS" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_USERGridEMAIL_ADDRESS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="143" fieldSourceType="DBColumn" dataType="Text" html="False" name="USER_STATUS" PathID="P_USERGridUSER_STATUS" fieldSource="USER_STATUS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="144" fieldSourceType="DBColumn" dataType="Text" name="P_USER_ID" PathID="P_USERGridP_USER_ID" fieldSource="P_USER_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="145" fieldSourceType="DBColumn" dataType="Text" html="False" name="USER_NAME" fieldSource="USER_NAME" wizardCaption="USER NAME" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_USERGridUSER_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="217" fieldSourceType="DBColumn" dataType="Text" html="False" name="FULL_NAME" fieldSource="FULL_NAME" wizardCaption="USER NAME" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_USERGridFULL_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="51" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="187" conditionType="Parameter" useIsNull="False" field="USER_NAME" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="216" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_USERSearch" wizardCaption="Search P APP USER " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_user.ccp" PathID="P_USERSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_USERSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="EMAIL ADDRESS" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_USERSearchs_keyword">
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
		<Record id="28" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_USERForm" errorSummator="Error" wizardCaption="Add/Edit P App User " wizardFormMethod="post" PathID="P_USERForm" activeCollection="ISQLParameters" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" customUpdateType="SQL" customUpdate="UPDATE P_USER SET 
DESCRIPTION='{DESCRIPTION}',
FULL_NAME='{FULL_NAME}',  
IS_NEW_USER='{IS_NEW_USER}', 
EMAIL_ADDRESS='{EMAIL_ADDRESS}', 
UPDATED_BY='{UPDATED_BY}', 
UPDATED_DATE=sysdate, 
P_USER_STATUS_ID={P_USER_STATUS_ID}, 
EMPLOYEE_NO = '{EMPLOYEE_NO}',
IS_EMPLOYEE = '{IS_EMPLOYEE}'
WHERE P_USER_ID = {P_USER_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_USER WHERE  P_USER_ID = {P_USER_ID}" dataSource="P_USER" customInsert="INSERT INTO P_USER(P_USER_ID, USER_NAME, USER_PWD, DESCRIPTION, PHONE_NO, EMAIL_ADDRESS, P_USER_STATUS_ID, IS_NEW_USER, FULL_NAME, EMPLOYEE_NO, IS_EMPLOYEE, CREATION_DATE, CREATED_BY,  UPDATED_DATE, UPDATED_BY ) VALUES( GENERATE_ID('','P_USER','P_USER_ID'), '{USER_NAME}', '{USER_PWD}', '{DESCRIPTION}', '{PHONE_NO}', '{EMAIL_ADDRESS}', {P_USER_STATUS_ID}, '{IS_NEW_USER}', '{FULL_NAME}', '{EMPLOYEE_NO}', '{IS_EMPLOYEE}', sysdate, '{CREATED_BY}', sysdate,'{UPDATED_BY}')">
			<Components>
				<Button id="29" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_USERFormButton_Insert" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="30" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_USERFormButton_Update" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="31" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_USERFormButton_Delete" removeParameters="FLAG;P_USER_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="32" message="Anda Yakin Menghapus Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="33" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_USERFormButton_Cancel" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="USER_NAME" fieldSource="USER_NAME" required="True" caption="User" wizardCaption="USER NAME" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormUSER_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="148" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="False" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormCREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="False" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormUPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EMAIL_ADDRESS" fieldSource="EMAIL_ADDRESS" required="True" caption="Email" wizardCaption="EMAIL ADDRESS" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormEMAIL_ADDRESS" inputMask="^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="191" fieldSourceType="DBColumn" dataType="Text" name="P_USER_ID" PathID="P_USERFormP_USER_ID" fieldSource="P_USER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<ListBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="USER_STATUS" fieldSource="USER_STATUS" required="False" caption="USER STATUS" wizardCaption="P USER STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormUSER_STATUS" sourceType="ListOfValues" connection="Conn" dataSource="1;ACTIVE;0;NEW USER;2;INACTIVE;3;BLOCKED" defaultValue="1" _valueOfList="3" _nameOfList="BLOCKED">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="41" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="IS_NEW_USER" caption="IS NEW USER" fieldSource="IS_NEW_USER" dataSource="Y;YA;N;TIDAK" required="True" PathID="P_USERFormIS_NEW_USER">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="LAST_LOGIN_TIME" fieldSource="LAST_LOGIN_TIME" required="False" caption="LAST LOGIN TIME" wizardCaption="LAST LOGIN TIME" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormLAST_LOGIN_TIME" format="dd-mmm-yyyy HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FULL_NAME" fieldSource="FULL_NAME" required="False" caption="FULL NAME" wizardCaption="FULL NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormFULL_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="153" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EMPLOYEE_NO" PathID="P_USERFormEMPLOYEE_NO" fieldSource="EMPLOYEE_NO" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="201" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_EMPLOYEE" fieldSource="IS_EMPLOYEE" required="False" caption="IS EMPLOYEE" wizardCaption="P USER STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormIS_EMPLOYEE" sourceType="ListOfValues" orderBy="P_USER_STATUS_ID" _valueOfList="Y" _nameOfList="INTERNAL" dataSource="N;EXTERNAL;Y;INTERNAL" connection="Conn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<Button id="202" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Reset" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="P_USERFormButton_Reset">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="209"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="218" message="Reset Password?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="False" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormCREATION_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="149" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="False" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormUPDATED_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_USERFormDESCRIPTION" sourceType="Table">
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
				</TextBox>
			</Components>
			<Events>
			</Events>
			<TableParameters>
				<TableParameter id="220" conditionType="Parameter" useIsNull="False" field="P_USER_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_USER_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="196" variable="P_USER_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="P_USER_ID"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="219" tableName="P_USER" posLeft="10" posTop="10" posWidth="157" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="236" variable="USER_NAME" dataType="Text" parameterType="Control" parameterSource="USER_NAME"/>
				<SQLParameter id="237" variable="CREATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="238" variable="UPDATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="239" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="241" variable="EMAIL_ADDRESS" dataType="Text" parameterType="Control" parameterSource="EMAIL_ADDRESS"/>
				<SQLParameter id="242" variable="P_USER_ID" dataType="Text" parameterType="Control" parameterSource="P_USER_ID"/>
				<SQLParameter id="243" variable="P_USER_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="P_USER_STATUS_ID"/>
				<SQLParameter id="244" variable="IS_NEW_USER" dataType="Text" parameterType="Control" parameterSource="IS_NEW_USER"/>
				<SQLParameter id="245" variable="LAST_LOGIN_TIME" dataType="Text" parameterType="Control" parameterSource="LAST_LOGIN_TIME" format="dd-mmm-yyyy"/>
				<SQLParameter id="246" variable="FULL_NAME" dataType="Text" parameterType="Control" parameterSource="FULL_NAME"/>
				<SQLParameter id="247" variable="EMPLOYEE_NO" dataType="Text" parameterType="Control" parameterSource="EMPLOYEE_NO"/>
				<SQLParameter id="248" variable="IS_EMPLOYEE" dataType="Text" parameterType="Control" parameterSource="IS_EMPLOYEE"/>
				<SQLParameter id="249" variable="USER_PWD" parameterType="Control" dataType="Text" parameterSource="USER_NAME"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="221" field="USER_NAME" dataType="Text" parameterType="Control" parameterSource="USER_NAME"/>
				<CustomParameter id="222" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="223" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="224" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="225" field="PHONE_NO" dataType="Text" parameterType="Control" parameterSource="PHONE_NO"/>
				<CustomParameter id="226" field="EMAIL_ADDRESS" dataType="Text" parameterType="Control" parameterSource="EMAIL_ADDRESS"/>
				<CustomParameter id="227" field="P_USER_ID" dataType="Text" parameterType="Control" parameterSource="P_USER_ID"/>
				<CustomParameter id="228" field="P_USER_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="P_USER_STATUS_ID"/>
				<CustomParameter id="229" field="IS_NEW_USER" dataType="Text" parameterType="Control" parameterSource="IS_NEW_USER"/>
				<CustomParameter id="230" field="LAST_LOGIN_TIME" dataType="Text" parameterType="Control" parameterSource="LAST_LOGIN_TIME" format="dd-mmm-yyyy"/>
				<CustomParameter id="231" field="FULL_NAME" dataType="Text" parameterType="Control" parameterSource="FULL_NAME"/>
				<CustomParameter id="232" field="EMPLOYEE_NO" dataType="Text" parameterType="Control" parameterSource="EMPLOYEE_NO"/>
				<CustomParameter id="233" field="IS_EMPLOYEE" dataType="Text" parameterType="Control" parameterSource="IS_EMPLOYEE"/>
				<CustomParameter id="234" field="CREATION_DATE" dataType="Text" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="235" field="UPDATED_DATE" dataType="Text" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="158" variable="USER_NAME" dataType="Text" parameterType="Control" parameterSource="USER_NAME"/>
				<SQLParameter id="159" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="160" variable="FULL_NAME" dataType="Text" parameterType="Control" parameterSource="FULL_NAME"/>
				<SQLParameter id="161" variable="IS_NEW_USER" dataType="Text" parameterType="Control" parameterSource="IS_NEW_USER"/>
				<SQLParameter id="162" variable="EMAIL_ADDRESS" dataType="Text" parameterType="Control" parameterSource="EMAIL_ADDRESS"/>
				<SQLParameter id="163" variable="UPDATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="165" variable="P_USER_ID" dataType="Float" parameterType="Control" parameterSource="P_USER_ID" defaultValue="0"/>
				<SQLParameter id="166" variable="P_USER_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="P_USER_STATUS_ID" defaultValue="0"/>
				<SQLParameter id="169" variable="EMPLOYEE_NO" parameterType="Control" dataType="Text" parameterSource="EMPLOYEE_NO"/>
				<SQLParameter id="204" variable="IS_EMPLOYEE" parameterType="Control" dataType="Text" parameterSource="IS_EMPLOYEE"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="170" conditionType="Parameter" useIsNull="False" field="P_APP_USER_ID" dataType="Float" parameterType="URL" parameterSource="P_APP_USER_ID" defaultValue="SELECTED_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="125" field="USER_NAME" dataType="Text" parameterType="Control" parameterSource="USER_NAME"/>
				<CustomParameter id="126" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="171" field="IP_ADDRESS" dataType="Text" parameterType="Control" parameterSource="IP_ADDRESS"/>
				<CustomParameter id="172" field="EXPIRED_USER" dataType="Date" parameterType="Control" parameterSource="EXPIRED_USER" format="dd-mmm-yyyy"/>
				<CustomParameter id="173" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="130" field="VERIFIED_BY" dataType="Text" parameterType="Control" parameterSource="VERIFIED_BY"/>
				<CustomParameter id="131" field="FULL_NAME" dataType="Text" parameterType="Control" parameterSource="FULL_NAME"/>
				<CustomParameter id="132" field="IS_PERMANENT_EMPLOYEE" dataType="Text" parameterType="Control" parameterSource="IS_PERMANENT_EMPLOYEE"/>
				<CustomParameter id="133" field="IS_NEW_USER" dataType="Text" parameterType="Control" parameterSource="IS_NEW_USER"/>
				<CustomParameter id="174" field="EMAIL_ADDRESS" dataType="Text" parameterType="Control" parameterSource="EMAIL_ADDRESS"/>
				<CustomParameter id="175" field="LAST_LOGIN_TIME" dataType="Date" parameterType="Control" parameterSource="LAST_LOGIN_TIME" format="dd-mmm-yyyy"/>
				<CustomParameter id="176" field="EXPIRED_PWD" dataType="Date" parameterType="Control" parameterSource="EXPIRED_PWD" format="dd-mmm-yyyy"/>
				<CustomParameter id="137" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="177" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="178" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="179" field="VERIFICATION_DATE" dataType="Date" parameterType="Control" parameterSource="VERIFICATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="180" field="APPROVED_BY" dataType="Text" parameterType="Control" parameterSource="APPROVED_BY"/>
				<CustomParameter id="181" field="APPROVAL_DATE" dataType="Date" parameterType="Control" parameterSource="APPROVAL_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="182" field="P_APP_USER_ID" dataType="Text" parameterType="Control" parameterSource="P_APP_USER_ID"/>
				<CustomParameter id="183" field="P_USER_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="P_USER_STATUS_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="184" variable="P_USER_ID" parameterType="Control" dataType="Float" parameterSource="P_USER_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="185" conditionType="Parameter" useIsNull="False" field="P_APP_USER_ID" dataType="Float" parameterType="URL" parameterSource="P_APP_USER_ID" defaultValue="SELECTED_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_user_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_user.php" forShow="True" url="p_user.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="49"/>
			</Actions>
		</Event>
	</Events>
</Page>
